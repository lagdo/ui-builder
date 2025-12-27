<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Builder\Html\AbstractElement;
use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Builder\Html\ElementExprEach;
use Lagdo\UiBuilder\Builder\Html\ElementExprList;
use Lagdo\UiBuilder\Builder\Html\ElementExprTake;
use Lagdo\UiBuilder\Builder\Html\ElementExprWhen;
use Lagdo\UiBuilder\Builder\Html\HtmlBuilder;
use Lagdo\UiBuilder\Builder\Html\Tag\AbstractTag;
use Lagdo\UiBuilder\Builder\Html\Tag\Comment;
use Lagdo\UiBuilder\Builder\Html\Tag\Text;
use Lagdo\UiBuilder\Component\ElementInterface;
use Lagdo\UiBuilder\Component\ColInterface;
use Lagdo\UiBuilder\Component\RowInterface;
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
        $this->builder->addElementBuilder('form', function(Element|null $element,
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
     * @inheritDoc
     */
    public function addElementBuilder(string $tagPrefix, Closure $tagBuilder)
    {
        $this->builder->addElementBuilder($tagPrefix, $tagBuilder);
    }

    /**
     * @inheritDoc
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
     * @inheritDoc
     */
    public function each(array $values, Closure $closure): AbstractElement
    {
        return new ElementExprEach($values, $closure);
    }

    /**
     * @inheritDoc
     */
    public function list(...$arguments): AbstractElement
    {
        return new ElementExprList($arguments);
    }

    /**
     * @inheritDoc
     */
    public function when(bool $condition, Closure $closure): AbstractElement
    {
        return new ElementExprWhen($condition, $closure);
    }

    /**
     * @inheritDoc
     */
    public function take(...$arguments): AbstractElement
    {
        return new ElementExprTake($arguments);
    }

    /**
     * @inheritDoc
     */
    public function text(string $text): AbstractTag
    {
        return new Text($text);
    }

    /**
     * @inheritDoc
     */
    public function html(string $html): AbstractTag
    {
        return new Text($html, false);
    }

    /**
     * @inheritDoc
     */
    public function comment(string $comment): AbstractTag
    {
        return new Comment($comment);
    }

    /**
     * @inheritDoc
     */
    public function build(...$arguments): string
    {
        return $this->builder->build($arguments);
    }
}
