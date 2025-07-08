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
use Lagdo\UiBuilder\Element\ElementInterface;
use Closure;

/**
 * @method ElementInterface div(...$arguments)
 * @method ElementInterface span(...$arguments)
 * @method ElementInterface label(...$arguments)
 * @method ElementInterface input(...$arguments)
 * @method ElementInterface formInput(...$arguments)
 * @method ElementInterface formSelect(...$arguments)
 * @method ElementInterface formTextArea(...$arguments)
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
     * @return ElementInterface
     */
    public function tag(string $name, ...$arguments): ElementInterface;

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
     * @return string
     */
    public function build(...$arguments): string;
}
