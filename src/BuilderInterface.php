<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Builder\ButtonBuilderInterface;
use Lagdo\UiBuilder\Builder\DropdownBuilderInterface;
use Lagdo\UiBuilder\Builder\FormBuilderInterface;
use Lagdo\UiBuilder\Builder\LayoutBuilderInterface;
use Lagdo\UiBuilder\Builder\MenuBuilderInterface;
use Lagdo\UiBuilder\Builder\PaginationBuilderInterface;
use Lagdo\UiBuilder\Builder\CardBuilderInterface;
use Lagdo\UiBuilder\Builder\TabBuilderInterface;
use Lagdo\UiBuilder\Builder\TableBuilderInterface;
use Lagdo\UiBuilder\Component\Attr\DirectionGetter;
use Lagdo\UiBuilder\Component\Attr\JustifyGetter;
use Lagdo\UiBuilder\Component\Attr\LevelGetter;
use Lagdo\UiBuilder\Component\Attr\SizeGetter;
use Lagdo\UiBuilder\Component\Attr\VariantGetter;
use Lagdo\UiBuilder\Component\Attr\VisualGetter;
use Lagdo\UiBuilder\Html\Component\Component;
use Lagdo\UiBuilder\Html\Element\Element;
use Lagdo\UiBuilder\Html\HtmlComponent;
use Closure;

/**
 * @method HtmlComponent body(...$arguments)
 * @method HtmlComponent div(...$arguments)
 * @method HtmlComponent span(...$arguments)
 * @method HtmlComponent a(...$arguments)
 * @method HtmlComponent i(...$arguments)
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
 * @method HtmlComponent optgroup(...$arguments)
 * @method HtmlComponent img(...$arguments)
 * @method HtmlComponent figure(...$arguments)
 */
interface BuilderInterface extends ButtonBuilderInterface, DropdownBuilderInterface,
    FormBuilderInterface, LayoutBuilderInterface, PaginationBuilderInterface,
    MenuBuilderInterface, CardBuilderInterface, TabBuilderInterface, TableBuilderInterface
{
    /**
     * @param string $prefix
     * @param Closure $helper
     *
     * @return void
     */
    public function registerBuilderHelper(string $prefix, Closure $helper): void;

    /**
     * @param string $prefix
     * @param Closure $helper
     *
     * @return void
     */
    public function registerElementHelper(string $prefix, Closure $helper): void;

    /**
     * @param string $prefix
     * @param Closure $helper
     *
     * @return void
     */
    public function registerComponentHelper(string $prefix, Closure $helper): void;

    /**
     * @param string $name
     *
     * @return HtmlComponent
     */
    public function tag(string $name, ...$arguments): mixed;

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
    public function pick(...$arguments): Component;

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
     * @return VisualGetter
     */
    public function visual(): VisualGetter;

    /**
     * @return LevelGetter
     */
    public function level(): LevelGetter;

    /**
     * @return SizeGetter
     */
    public function size(): SizeGetter;

    /**
     * @return JustifyGetter
     */
    public function justify(): JustifyGetter;

    /**
     * @return DirectionGetter
     */
    public function direction(): DirectionGetter;

    /**
     * @return VariantGetter
     */
    public function variant(): VariantGetter;

    /**
     * @return string
     */
    public function build(...$arguments): string;
}
