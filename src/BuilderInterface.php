<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Builder\DropdownInterface;
use Lagdo\UiBuilder\Builder\FormInterface;
use Lagdo\UiBuilder\Builder\HtmlInterface;
use Lagdo\UiBuilder\Builder\MenuInterface;
use Lagdo\UiBuilder\Builder\PaginationInterface;
use Lagdo\UiBuilder\Builder\PanelInterface;
use Lagdo\UiBuilder\Builder\TabInterface;
use Lagdo\UiBuilder\Builder\TableInterface;

/**
 * @method BuilderInterface div()
 * @method BuilderInterface span()
 * @method BuilderInterface label()
 * @method BuilderInterface input()
 * @method BuilderInterface formInput()
 * @method BuilderInterface formSelect()
 * @method BuilderInterface formTextArea()
 * @method BuilderInterface setId(string $id)
 * @method BuilderInterface setClass(string $class)
 * @method BuilderInterface setFor(string $for)
 * @method BuilderInterface setName(string $name)
 * @method BuilderInterface setValue(string $value)
 * @method BuilderInterface setType(string $type)
 */
interface BuilderInterface extends DropdownInterface, FormInterface, HtmlInterface,
    MenuInterface, PaginationInterface, PanelInterface, TabInterface, TableInterface
{
    /**
     * @return string
     */
    public function build(): string;

    /**
     * @return self
     */
    public function clear(): self;

    /**
     * @param array $attributes
     *
     * @return self
     */
    public function setAttributes(array $attributes): self;

    /**
     * @param string $text
     *
     * @return self
     */
    public function addText(string $text): self;

    /**
     * @return self
     */
    public function text(...$arguments): self;

    /**
     * @param string $html
     *
     * @return self
     */
    public function addHtml(string $html): self;

    /**
     * @param string $comment
     *
     * @return self
     */
    public function addComment(string $comment): self;

    /**
     * @return self
     */
    public function end(): self;

    /**
     * @return self
     */
    public function endShorted(): self;

    /**
     * @return self
     */
    public function endOpened(): self;
}
