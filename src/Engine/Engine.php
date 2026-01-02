<?php

namespace Lagdo\UiBuilder\Engine;

use Lagdo\UiBuilder\Component\HtmlComponent;
use Lagdo\UiBuilder\Component\HtmlElement;
use Lagdo\UiBuilder\Component\Html\Element;
use Lagdo\UiBuilder\Component\Html\Html;
use Closure;
use LogicException;

use function is_array;
use function is_string;
use function preg_replace;
use function stripos;
use function strlen;
use function strtolower;
use function substr;

class Engine
{
    /**
     * @var int
     */
    public const TARGET_BUILDER = 'builder';

    /**
     * @var int
     */
    public const TARGET_COMPONENT = 'component';

    /**
     * @var int
     */
    public const TARGET_ELEMENT = 'element';

    /**
     * @var array<string, array<string, Closure>>
     */
    protected $helpers = [
        self::TARGET_BUILDER => [],
        self::TARGET_COMPONENT => [],
        self::TARGET_ELEMENT => [],
    ];

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->registerHelper('set', self::TARGET_COMPONENT,
            function(HtmlComponent $component, string $tagName,
                string $method, array $arguments): HtmlComponent {
                $component->setAttribute($tagName, $arguments[0] ?? null, $arguments[1] ?? true);
                return $component;
            });
        $this->registerHelper('set', self::TARGET_ELEMENT,
            function(HtmlElement $element, string $tagName,
                string $method, array $arguments): HtmlElement {
                $element->setAttribute($tagName, $arguments[0] ?? null, $arguments[1] ?? true);
                return $element;
            });
    }

    /**
     * @param string $tagPrefix
     * @param string $tagTarget
     * @param Closure $tagHelper
     *
     * @return void
     */
    public function registerHelper(string $tagPrefix, string $tagTarget, Closure $tagHelper): void
    {
        // Do not overwrite existing helpers.
        if(isset($this->helpers[$tagTarget]) && !isset($this->helpers[$tagTarget][$tagPrefix])) {
            $this->helpers[$tagTarget][$tagPrefix] = $tagHelper;
        }
    }

    /**
     * @param string $method
     *
     * @return string
     */
    private function getTagName(string $method): string
    {
        return strtolower(preg_replace('/(?<!^)([A-Z])/', '-$1', $method));
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return HtmlComponent|Element
     */
    public function callBuilderHelper(string $method, array $arguments): HtmlComponent|Element
    {
        $tagName = $this->getTagName($method);
        foreach($this->helpers[self::TARGET_BUILDER] as $tagPrefix => $helper) {
            if (stripos($tagName, "$tagPrefix-") === 0) {
                $tagName = substr($tagName, strlen($tagPrefix) + 1);
                return $helper($tagName, $method, $arguments);
            }
        }

        return $this->createComponent($tagName, $arguments);
    }

    /**
     * @param HtmlComponent $component
     * @param string $method
     * @param array $arguments
     *
     * @return HtmlComponent
     * @throws LogicException When component is not initialized yet
     */
    public function callComponentHelper(HtmlComponent $component, string $method, array $arguments): HtmlComponent
    {
        $tagName = $this->getTagName($method);
        foreach($this->helpers[self::TARGET_COMPONENT] as $tagPrefix => $helper) {
            if (stripos($tagName, "$tagPrefix-") === 0) {
                $tagName = substr($tagName, strlen($tagPrefix) + 1);
                return $helper($component, $tagName, $method, $arguments);
            }
        }

        throw new LogicException("No \"{$method}()\" method defined in the HTML component.");
    }

    /**
     * @param HtmlElement $element
     * @param string $method
     * @param array $arguments
     *
     * @return HtmlElement
     * @throws LogicException When component is not initialized yet
     */
    public function callElementHelper(HtmlElement $element, string $method, array $arguments): HtmlElement
    {
        $tagName = $this->getTagName($method);
        foreach($this->helpers[self::TARGET_ELEMENT] as $tagPrefix => $helper) {
            if (stripos($tagName, "$tagPrefix-") === 0) {
                $tagName = substr($tagName, strlen($tagPrefix) + 1);
                return $helper($element, $tagName, $method, $arguments);
            }
        }

        throw new LogicException("No \"{$method}()\" method defined in the HTML element.");
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return HtmlElement
     */
    public function createElement(string $name, array $arguments = []): HtmlElement
    {
        $element = new HtmlElement($this, $name);
        // Resolve arguments
        foreach ($arguments as $argument) {
            switch (true) {
            case is_array($argument):
                $element->setAttributes($argument);
                break;
            case is_string($argument):
                $element->addChild(new Html($argument));
            }
        }
        return $element;
    }

    /**
     * @template T of HtmlComponent
     * @param string $name
     * @param array $arguments
     * @psalm-param class-string<T> $class
     *
     * @return T
     */
    public function createComponent(string $name, array $arguments = [],
        string $class = HtmlComponent::class): mixed
    {
        return new $class($this, $name, $arguments);
    }

    /**
     * @param string $name
     *
     * @return HtmlElement
     */
    public function tag(string $name, ...$arguments): HtmlElement
    {
        return $this->createElement($name, $arguments);
    }

    /**
     * @param array $arguments
     *
     * @return string
     */
    public function build(array $arguments): string
    {
        // The "root" component below will not be printed.
        $scope = new Scope($this->createComponent('root'));
        $scope->build($arguments);
        return $scope->html();
    }
}
