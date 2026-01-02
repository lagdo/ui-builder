<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Component\Base\Component;
use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Html\Comment;
use Lagdo\UiBuilder\Component\Html\Element;
use Lagdo\UiBuilder\Component\Html\Html;
use Lagdo\UiBuilder\Component\Html\Text;
use Lagdo\UiBuilder\Component\Virtual\EachComponent;
use Lagdo\UiBuilder\Component\Virtual\ListComponent;
use Lagdo\UiBuilder\Component\Virtual\TakeComponent;
use Lagdo\UiBuilder\Component\Virtual\WhenComponent;
use Lagdo\UiBuilder\Engine\Engine;
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
     * @var Engine
     */
    private $engine;

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->engine = new Engine();
        $this->engine->registerHelper('form', Engine::TARGET_BUILDER,
            fn(string $tagName, string $method, array $arguments) =>
                $this->createFormComponent($tagName, $arguments));
    }

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
     * @inheritDoc
     */
    public function tag(string $name, ...$arguments): HtmlComponent
    {
        return $this->engine->createComponent($name, $arguments);
    }

    /**
     * Create a component
     *
     * @param string $name
     * @param array $arguments
     *
     * @return HtmlComponent
     */
    protected function createComponent(string $name, $arguments): HtmlComponent
    {
        return $this->engine->createComponent($name, $arguments);
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
    protected function createComponentOfClass(string $class, $arguments): HtmlComponent
    {
        return $this->engine->createComponent($class::$tag, $arguments, $class);
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
