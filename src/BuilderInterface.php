<?php

namespace Lagdo\UiBuilder;

use AvpLab\Element\Element as Block;
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
use Lagdo\UiBuilder\Element\ElementInterface;
use Lagdo\UiBuilder\Element\LabelInterface;
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
     * @return ElementInterface|Block
     */
    public function tag(string $name, ...$arguments): ElementInterface|Block;

    /**
     * @return AbstractElement
     */
    public function each(array $values, Closure $closure): AbstractElement;

    /**
     * @return AbstractElement
     */
    public function list(...$arguments): AbstractElement;

    /**
     * @return AbstractElement
     */
    public function when(bool $condition, Closure $closure): AbstractElement;

    /**
     * @return LabelInterface
     */
    public function label(...$arguments): LabelInterface;

    /**
     * @param string $text
     *
     * @return Block
     */
    public function text(string $text): Block;

    /**
     * @param string $html
     *
     * @return Block
     */
    public function html(string $html): Block;

    /**
     * @param string $comment
     *
     * @return Block
     */
    public function comment(string $comment): Block;

    /**
     * @return string
     */
    public function build(...$arguments): string;
}
