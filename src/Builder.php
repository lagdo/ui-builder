<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Builder\Engine\Engine;
use Lagdo\UiBuilder\Component\Component;
use Lagdo\UiBuilder\Component\HtmlComponent;
use Lagdo\UiBuilder\Component\Html\Comment;
use Lagdo\UiBuilder\Component\Html\Element;
use Lagdo\UiBuilder\Component\Html\Html;
use Lagdo\UiBuilder\Component\Html\Text;
use Lagdo\UiBuilder\Component\Virtual\EachComponent;
use Lagdo\UiBuilder\Component\Virtual\ListComponent;
use Lagdo\UiBuilder\Component\Virtual\PickComponent;
use Lagdo\UiBuilder\Component\Virtual\WhenComponent;
use Closure;

abstract class Builder implements BuilderInterface
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
     * @var int
     */
    public const TARGET_BUILDER = 0;

    /**
     * @var int
     */
    public const TARGET_COMPONENT = 1;

    /**
     * @var int
     */
    public const TARGET_ELEMENT = 2;

    /**
     * @var Engine
     */
    private $engine;

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->engine = new Engine($this);
        $this->_init();
    }

    /**
     * @return void
     */
    abstract protected function _init(): void;

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return HtmlComponent
     */
    public function __call(string $method, array $arguments): mixed
    {
        return $this->engine->callBuilderHelper($method, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function registerHelper(string $tagPrefix, string $tagTarget, Closure $tagHelper): void
    {
        $this->engine->registerHelper($tagPrefix, $tagTarget, $tagHelper);
    }

    /**
     * Create a component
     *
     * @template T of HtmlComponent
     * @param string $name
     * @param array $arguments
     * @psalm-param class-string<T> $class
     *
     * @return T
     */
    private function _createComponent(string $name, array $arguments = [],
        string $class = HtmlComponent::class): mixed
    {
        return new $class($this->engine, $name, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tag(string $name, ...$arguments): HtmlComponent
    {
        return $this->_createComponent($name, $arguments);
    }

    /**
     * Create a component
     *
     * @param string $name
     * @param array $arguments
     *
     * @return HtmlComponent
     */
    public function createComponent(string $name, $arguments = []): HtmlComponent
    {
        return $this->_createComponent($name, $arguments);
    }

    /**
     * Create a component of a given class name
     *
     * @template T of HtmlComponent
     * @psalm-param class-string<T> $class
     * @param array $arguments
     *
     * @return T
     */
    protected function createComponentOfClass(string $class, $arguments = []): HtmlComponent
    {
        return $this->_createComponent($class::$tag, $arguments, $class);
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
    public function pick(...$arguments): Component
    {
        return new PickComponent($arguments);
    }

    /**
     * @inheritDoc
     */
    public function text(string $text): Element
    {
        return new Text($text);
    }

    /**
     * @inheritDoc
     */
    public function html(string $html): Element
    {
        return new Html($html);
    }

    /**
     * @inheritDoc
     */
    public function comment(string $comment): Element
    {
        return new Comment($comment);
    }

    /**
     * @inheritDoc
     */
    public function build(...$arguments): string
    {
        return $this->engine->build($arguments);
    }
}
