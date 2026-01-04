<?php

namespace Lagdo\UiBuilder\Builder\Engine;

use Lagdo\UiBuilder\Builder;
use Lagdo\UiBuilder\Component\HtmlComponent;
use Lagdo\UiBuilder\Component\HtmlElement;
use Lagdo\UiBuilder\Component\Html\Element;
use Closure;
use LogicException;

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
    private int $formLevel = 0;

    /**
     * @var array<array<string, Closure>>
     */
    protected $helpers = [
        /*Builder::TARGET_BUILDER =>*/ [],
        /*Builder::TARGET_COMPONENT =>*/ [],
        /*Builder::TARGET_ELEMENT =>*/ [],
    ];

    /**
     * The constructor
     *
     * @param Builder $builder
     */
    public function __construct(private Builder $builder)
    {
        $this->registerHelper('set', Builder::TARGET_COMPONENT,
            function(HtmlComponent $component, string $tagName,
                string $method, array $arguments): HtmlComponent {
                $component->setAttribute($tagName, $arguments[0] ?? null, $arguments[1] ?? true);
                return $component;
            });
        $this->registerHelper('set', Builder::TARGET_ELEMENT,
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
        foreach($this->helpers[Builder::TARGET_BUILDER] as $tagPrefix => $helper) {
            if (stripos($tagName, "$tagPrefix-") === 0) {
                $tagName = substr($tagName, strlen($tagPrefix) + 1);
                return $helper($tagName, $method, $arguments);
            }
        }

        return $this->builder->createComponent($tagName, $arguments);
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
        foreach($this->helpers[Builder::TARGET_COMPONENT] as $tagPrefix => $helper) {
            if (stripos($tagName, "$tagPrefix-") === 0) {
                $tagName = substr($tagName, strlen($tagPrefix) + 1);
                return $helper($component, $tagName, $method, $arguments);
            }
        }

        throw new LogicException("Call to undefined method \"{$method}()\" in the HTML component.");
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
        foreach($this->helpers[Builder::TARGET_ELEMENT] as $tagPrefix => $helper) {
            if (stripos($tagName, "$tagPrefix-") === 0) {
                $tagName = substr($tagName, strlen($tagPrefix) + 1);
                return $helper($element, $tagName, $method, $arguments);
            }
        }

        throw new LogicException("Call to undefined method \"{$method}()\" in the HTML element.");
    }

    /**
     * @return void
     */
    public function formStarted(): void
    {
        $this->formLevel++;
    }

    /**
     * @return void
     */
    public function formEnded(): void
    {
        $this->formLevel--;
    }

    /**
     * @return bool
     */
    public function inForm(): bool
    {
        return $this->formLevel > 0;
    }

    /**
     * @param array $arguments
     *
     * @return string
     */
    public function build(array $arguments): string
    {
        $this->formLevel = 0;
        // The "root" component below will not be printed.
        $scope = new Scope($this->builder->createComponent('root'));
        $scope->build($this, $arguments);

        return $scope->html();
    }
}
