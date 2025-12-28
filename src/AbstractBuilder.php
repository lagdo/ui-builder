<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Builder\Html\HtmlBuilder;
use Lagdo\UiBuilder\Component\Base\Component;
use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Virtual\EachComponent;
use Lagdo\UiBuilder\Component\Virtual\ListComponent;
use Lagdo\UiBuilder\Component\Virtual\TakeComponent;
use Lagdo\UiBuilder\Component\Virtual\WhenComponent;
use Lagdo\UiBuilder\Html\HtmlElement;
use Lagdo\UiBuilder\Html\Comment;
use Lagdo\UiBuilder\Html\Text;
use Closure;

abstract class AbstractBuilder implements BuilderInterface
{
    use Builder\LayoutBuilderTrait;
    use Builder\ButtonBuilderTrait;
    use Builder\DropdownBuilderTrait;
    use Builder\PanelBuilderTrait;
    use Builder\FormBuilderTrait;
    use Builder\MenuBuilderTrait;
    use Builder\TabBuilderTrait;
    use Builder\PaginationBuilderTrait;
    use Builder\TableBuilderTrait;

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
        $this->builder->addElementBuilder('form', function(HtmlComponent|null $element,
            string $tagName, string $method, array $arguments) {
            return $this->createFormElement($tagName, $arguments);
        });
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return HtmlComponent
     */
    public function __call(string $method, array $arguments): mixed
    {
        return $this->builder->make($method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function addElementBuilder(string $tagPrefix, Closure $tagBuilder): void
    {
        $this->builder->addElementBuilder($tagPrefix, $tagBuilder);
    }

    /**
     * @inheritDoc
     */
    public function tag(string $name, ...$arguments): HtmlComponent
    {
        return $this->builder->createElement($name, $arguments);
    }

    /**
     * Create an element of a given class name
     *
     * @template T of HtmlComponent
     * @psalm-param class-string<T> $class
     * @param array $arguments
     *
     * @return T
     */
    protected function createElementOfClass(string $class, $arguments): HtmlComponent
    {
        return $this->builder->createElement($class::$tag, $arguments, $class);
    }

    /**
     * @inheritDoc
     */
    public function each(array $values, Closure $closure): Component
    {
        return new EachComponent($values, $closure);
    }

    /**
     * @inheritDoc
     */
    public function list(...$arguments): Component
    {
        return new ListComponent($arguments);
    }

    /**
     * @inheritDoc
     */
    public function when(bool $condition, Closure $closure): Component
    {
        return new WhenComponent($condition, $closure);
    }

    /**
     * @inheritDoc
     */
    public function take(...$arguments): Component
    {
        return new TakeComponent($arguments);
    }

    /**
     * @inheritDoc
     */
    public function text(string $text): HtmlElement
    {
        return new Text($text);
    }

    /**
     * @inheritDoc
     */
    public function html(string $html): HtmlElement
    {
        return new Text($html, false);
    }

    /**
     * @inheritDoc
     */
    public function comment(string $comment): HtmlElement
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
