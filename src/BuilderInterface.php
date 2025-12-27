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
use Lagdo\UiBuilder\Builder\Html\AbstractElement;
use Lagdo\UiBuilder\Builder\Html\Tag\AbstractTag;
use Lagdo\UiBuilder\Component\ElementInterface;
use Lagdo\UiBuilder\Component\LabelInterface;
use Closure;

/**
 * @method ElementInterface body(...$arguments)
 * @method ElementInterface div(...$arguments)
 * @method ElementInterface span(...$arguments)
 * @method ElementInterface input(...$arguments)
 * @method ElementInterface formInput(...$arguments)
 * @method ElementInterface formSelect(...$arguments)
 * @method ElementInterface formTextArea(...$arguments)
 * @method ElementInterface thead(...$arguments)
 * @method ElementInterface tbody(...$arguments)
 * @method ElementInterface tr(...$arguments)
 * @method ElementInterface th(...$arguments)
 * @method ElementInterface td(...$arguments)
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
    public function addElementBuilder(string $tagPrefix, Closure $tagBuilder);

    /**
     * @param string $name
     *
     * @return ElementInterface|AbstractTag
     */
    public function tag(string $name, ...$arguments): ElementInterface|AbstractTag;

    /**
     * @param array $values
     * @param Closure $closure
     *
     * @return AbstractElement
     */
    public function each(array $values, Closure $closure): AbstractElement;

    /**
     * @return AbstractElement
     */
    public function list(...$arguments): AbstractElement;

    /**
     * @param bool $condition
     * @param Closure $closure
     *
     * @return AbstractElement
     */
    public function when(bool $condition, Closure $closure): AbstractElement;

    /**
     * @return AbstractElement
     */
    public function take(...$arguments): AbstractElement;

    /**
     * @return LabelInterface
     */
    public function label(...$arguments): LabelInterface;

    /**
     * @param string $text
     *
     * @return AbstractTag
     */
    public function text(string $text): AbstractTag;

    /**
     * @param string $html
     *
     * @return AbstractTag
     */
    public function html(string $html): AbstractTag;

    /**
     * @param string $comment
     *
     * @return AbstractTag
     */
    public function comment(string $comment): AbstractTag;

    /**
     * @return string
     */
    public function build(...$arguments): string;
}
