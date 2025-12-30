<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Builder\ButtonBuilderInterface;
use Lagdo\UiBuilder\Builder\DropdownBuilderInterface;
use Lagdo\UiBuilder\Builder\FormBuilderInterface;
use Lagdo\UiBuilder\Builder\LayoutBuilderInterface;
use Lagdo\UiBuilder\Builder\MenuBuilderInterface;
use Lagdo\UiBuilder\Builder\PaginationBuilderInterface;
use Lagdo\UiBuilder\Builder\PanelBuilderInterface;
use Lagdo\UiBuilder\Builder\TabBuilderInterface;
use Lagdo\UiBuilder\Builder\TableBuilderInterface;
use Lagdo\UiBuilder\Component\Base\Component;
use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Html\Element;
use Closure;

/**
 * @method HtmlComponent body(...$arguments)
 * @method HtmlComponent div(...$arguments)
 * @method HtmlComponent span(...$arguments)
 * @method HtmlComponent a(...$arguments)
 * @method HtmlComponent i(...$arguments)
 * @method HtmlComponent input(...$arguments)
 * @method HtmlComponent formCol(...$arguments)
 * @method HtmlComponent formRow(...$arguments)
 * @method HtmlComponent formLabel(...$arguments)
 * @method HtmlComponent formInput(...$arguments)
 * @method HtmlComponent formSelect(...$arguments)
 * @method HtmlComponent formTextArea(...$arguments)
 * @method HtmlComponent thead(...$arguments)
 * @method HtmlComponent tbody(...$arguments)
 * @method HtmlComponent tr(...$arguments)
 * @method HtmlComponent th(...$arguments)
 * @method HtmlComponent td(...$arguments)
 * @method HtmlComponent nav(...$arguments)
 * @method HtmlComponent h1(...$arguments)
 * @method HtmlComponent h2(...$arguments)
 * @method HtmlComponent h3(...$arguments)
 * @method HtmlComponent h4(...$arguments)
 * @method HtmlComponent h5(...$arguments)
 * @method HtmlComponent h6(...$arguments)
 * @method HtmlComponent ol(...$arguments)
 * @method HtmlComponent ul(...$arguments)
 * @method HtmlComponent li(...$arguments)
 * @method HtmlComponent select(...$arguments)
 * @method HtmlComponent option(...$arguments)
 * @method HtmlComponent optgroup(...$arguments)
 * @method HtmlComponent img(...$arguments)
 * @method HtmlComponent figure(...$arguments)
 */
interface BuilderInterface extends ButtonBuilderInterface, DropdownBuilderInterface,
    FormBuilderInterface, LayoutBuilderInterface, PaginationBuilderInterface,
    MenuBuilderInterface, PanelBuilderInterface, TabBuilderInterface, TableBuilderInterface
{
    /**
     * @param string $tagPrefix
     * @param string $tagTarget
     * @param Closure $tagFactory
     *
     * @return void
     */
    public function registerFactory(string $tagPrefix, string $tagTarget, Closure $tagFactory): void;

    /**
     * @param string $name
     *
     * @return HtmlComponent
     */
    public function tag(string $name, ...$arguments): HtmlComponent;

    /**
     * @param array $values
     * @param Closure $closure
     *
     * @return Component
     */
    public function each(array $values, Closure $closure): Component;

    /**
     * @return Component
     */
    public function list(...$arguments): Component;

    /**
     * @param bool $condition
     * @param Closure $closure
     *
     * @return Component
     */
    public function when(bool $condition, Closure $closure): Component;

    /**
     * @return Component
     */
    public function take(...$arguments): Component;

    /**
     * @param string $text
     *
     * @return Element
     */
    public function text(string $text): Element;

    /**
     * @param string $html
     *
     * @return Element
     */
    public function html(string $html): Element;

    /**
     * @param string $comment
     *
     * @return Element
     */
    public function comment(string $comment): Element;

    /**
     * @return string
     */
    public function build(...$arguments): string;
}
