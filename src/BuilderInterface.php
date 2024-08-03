<?php

namespace Lagdo\UiBuilder;

use Closure;
use Lagdo\UiBuilder\Builder\ButtonInterface;
use Lagdo\UiBuilder\Builder\DropdownInterface;
use Lagdo\UiBuilder\Builder\FormInterface;
use Lagdo\UiBuilder\Builder\LayoutInterface;
use Lagdo\UiBuilder\Builder\MenuInterface;
use Lagdo\UiBuilder\Builder\PaginationInterface;
use Lagdo\UiBuilder\Builder\PanelInterface;
use Lagdo\UiBuilder\Builder\TabInterface;
use Lagdo\UiBuilder\Builder\TableInterface;

/**
 * @method BuilderInterface div(...$arguments)
 * @method BuilderInterface span(...$arguments)
 * @method BuilderInterface label(...$arguments)
 * @method BuilderInterface input(...$arguments)
 * @method BuilderInterface formInput(...$arguments)
 * @method BuilderInterface formSelect(...$arguments)
 * @method BuilderInterface formTextArea(...$arguments)
 * @method BuilderInterface setId(string $id)
 * @method BuilderInterface setClass(string $class)
 * @method BuilderInterface setFor(string $for)
 * @method BuilderInterface setName(string $name)
 * @method BuilderInterface setValue(string $value)
 * @method BuilderInterface setType(string $type)
 */
interface BuilderInterface extends ButtonInterface, DropdownInterface, FormInterface,
    LayoutInterface, MenuInterface, PaginationInterface, PanelInterface, TabInterface,
    TableInterface
{
    /**
     * @param string $tagPrefix
     * @param Closure $tagBuilder
     *
     * @return void
     */
    public function addTagBuilder(string $tagPrefix, Closure $tagBuilder);

    /**
     * @return string
     */
    public function build(): string;

    /**
     * @return BuilderInterface
     */
    public function clear(): BuilderInterface;

    /**
     * @param array $attributes
     *
     * @return BuilderInterface
     */
    public function setAttributes(array $attributes): BuilderInterface;

    /**
     * @param string $text
     *
     * @return BuilderInterface
     */
    public function addText(string $text): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function text(...$arguments): BuilderInterface;

    /**
     * @param string $html
     *
     * @return BuilderInterface
     */
    public function addHtml(string $html): BuilderInterface;

    /**
     * @param string $comment
     *
     * @return BuilderInterface
     */
    public function addComment(string $comment): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function end(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function endShorted(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function endOpened(): BuilderInterface;
}
