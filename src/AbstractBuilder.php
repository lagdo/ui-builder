<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Builder\Html\AbstractElement;
use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Builder\Html\ElementExprEach;
use Lagdo\UiBuilder\Builder\Html\ElementExprList;
use Lagdo\UiBuilder\Builder\Html\ElementExprWhen;
use Lagdo\UiBuilder\Builder\Html\HtmlBuilder;
use Lagdo\UiBuilder\Element\ElementInterface;
use Lagdo\UiBuilder\Element\ColInterface;
use Lagdo\UiBuilder\Element\RowInterface;
use Closure;

abstract class AbstractBuilder implements BuilderInterface
{
    /**
     * @var HtmlBuilder
     */
    protected $builder;

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->builder = new HtmlBuilder();
        $this->builder->addTagBuilder('form', function(Element|null $element,
            string $tagName, string $method, array $arguments) {
            return $this->createFormElement($tagName, $arguments);
        });
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return ElementInterface
     */
    public function __call(string $method, array $arguments): mixed
    {
        return $this->builder->make($method, $arguments);
    }

    /**
     * @param string $tagPrefix
     * @param Closure $tagBuilder
     *
     * @return void
     */
    public function addTagBuilder(string $tagPrefix, Closure $tagBuilder)
    {
        $this->builder->addTagBuilder($tagPrefix, $tagBuilder);
    }

    /**
     * @param string $name
     *
     * @return ElementInterface
     */
    public function tag(string $name, ...$arguments): ElementInterface
    {
        return $this->builder->createElement($name, $arguments);
    }

    /**
     * Create an element of a given class name
     *
     * @template T of Element
     * @psalm-param class-string<T> $class
     * @param array $arguments
     *
     * @return T
     */
    protected function createElementOfClass(string $class, $arguments): Element
    {
        return $this->builder->createElement($class::$tag, $arguments, $class);
    }

    /**
     * @param string $tagName
     * @param array $arguments
     *
     * @return ElementInterface
     */
    abstract protected function createFormElement(string $tagName, $arguments): ElementInterface;

    /**
     * @inheritDoc
     */
    public function formRow(...$arguments): RowInterface
    {
        return $this->row(...$arguments);
    }

    /**
     * @inheritDoc
     */
    public function formCol(...$arguments): ColInterface
    {
        return $this->col(...$arguments);
    }

    /**
     * @param array $values
     * @param Closure $closure
     *
     * @return ElementExprEach
     */
    public function each(array $values, Closure $closure): AbstractElement
    {
        return new ElementExprEach($values, $closure);
    }

    /**
     * @return AbstractElement
     */
    public function list(...$arguments): AbstractElement
    {
        return new ElementExprList($arguments);
    }

    /**
     * @param bool $condition
     * @param Closure $closure
     *
     * @return AbstractElement
     */
    public function when(bool $condition, Closure $closure): AbstractElement
    {
        return new ElementExprWhen($condition, $closure);
    }

    /**
     * @inheritDoc
     */
    public function build(...$arguments): string
    {
        return $this->builder->build($arguments);
    }
}
