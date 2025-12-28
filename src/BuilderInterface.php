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
use Lagdo\UiBuilder\Component\LabelComponent;
use Lagdo\UiBuilder\Html\HtmlElement;
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
 */
interface BuilderInterface extends ButtonBuilderInterface, DropdownBuilderInterface,
    FormBuilderInterface, LayoutBuilderInterface, PaginationBuilderInterface,
    MenuBuilderInterface, PanelBuilderInterface, TabBuilderInterface, TableBuilderInterface
{
    /**
     * @param string $tagPrefix
     * @param Closure $tagBuilder
     *
     * @return void
     */
    public function addElementBuilder(string $tagPrefix, Closure $tagBuilder): void;

    /**
     * @param string $name
     *
     * @return HtmlComponent|HtmlElement
     */
    public function tag(string $name, ...$arguments): HtmlComponent|HtmlElement;

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
     * @return LabelComponent
     */
    public function label(...$arguments): LabelComponent;

    /**
     * @param string $text
     *
     * @return HtmlElement
     */
    public function text(string $text): HtmlElement;

    /**
     * @param string $html
     *
     * @return HtmlElement
     */
    public function html(string $html): HtmlElement;

    /**
     * @param string $comment
     *
     * @return HtmlElement
     */
    public function comment(string $comment): HtmlElement;

    /**
     * @return string
     */
    public function build(...$arguments): string;
}
