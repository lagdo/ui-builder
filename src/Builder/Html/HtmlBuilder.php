<?php

namespace Lagdo\UiBuilder\Builder\Html;

use Lagdo\UiBuilder\Element\ElementInterface;
use Closure;
use LogicException;

use function preg_replace;
use function stripos;
use function strlen;
use function strtolower;
use function substr;

class HtmlBuilder
{
    /**
     * @var array<string, Closure>
     */
    protected $tagBuilders = [];

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->addTagBuilder('set', function(Element|null $element,
            string $tagName, string $method, array $arguments) {
            if ($element === null) {
                throw new LogicException('Attributes can be set for elements only');
            }
            $element->attributes[$tagName] = $arguments[0] ?? null;
            return $element;
        });
    }

    /**
     * @template T of Element
     * @param string $name
     * @param array $arguments
     * @psalm-param class-string<T> $class
     *
     * @return T
     */
    public function createElement(string $name, array $arguments = [],
        string $class = Element::class): mixed
    {
        return new $class($this, $name, $arguments);
    }

    /**
     * @param string $tagPrefix
     * @param Closure $tagBuilder
     *
     * @return void
     */
    public function addTagBuilder(string $tagPrefix, Closure $tagBuilder)
    {
        // Do not overwrite existing builders.
        if(!isset($this->tagBuilders[$tagPrefix]))
        {
            $this->tagBuilders[$tagPrefix] = $tagBuilder;
        }
    }

    /**
     * @param string $method
     * @param array $arguments
     * @param Element|null $element
     *
     * @return ElementInterface
     * @throws LogicException When element is not initialized yet
     */
    public function make(string $method, array $arguments, Element|null $element = null): ElementInterface
    {
        $tagName = strtolower(preg_replace('/(?<!^)([A-Z])/', '-$1', $method));
        foreach($this->tagBuilders as $tagPrefix => $tagBuilder)
        {
            if (stripos($tagName, "$tagPrefix-") === 0) {
                $tagName = substr($tagName, strlen($tagPrefix) + 1);
                return $tagBuilder($element, $tagName, $method, $arguments);
            }
        }
        return $this->createElement($tagName, $arguments);
    }

    /**
     * @param string $name
     *
     * @return Element
     */
    public function tag(string $name, ...$arguments): Element
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
        // The "root" element created below is not printed.
        $scope = new Scope($this->createElement('root'));
        $scope->build($arguments);
        return $scope->html();
    }
}
