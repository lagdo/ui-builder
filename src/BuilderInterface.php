<?php

namespace Lagdo\UiBuilder;

use Closure;

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
interface BuilderInterface
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
     * @return self
     * @throws RuntimeException When element is not initialized yet.
     */
    public function end(): self;

    /**
     * @param string $text
     *
     * @return self
     */
    public function addText(string $text): self;

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
    public function addComment($comment): self;

    /**
     * @param string $icon
     *
     * @return self
     */
    public function addIcon(string $icon): self;

    /**
     * @return self
     */
    public function addCaret(): self;

    /**
     * @param bool $checked
     *
     * @return self
     */
    public function checkbox(bool $checked = false, ...$arguments): self;

    /**
     * @param bool $checked
     *
     * @return self
     */
    public function radio(bool $checked = false, ...$arguments): self;

    /**
     * @param bool $selected
     *
     * @return self
     */
    public function option(bool $selected = false, ...$arguments): self;

    /**
     * @return self
     */
    public function text(): self;

    /**
     * @return self
     */
    public function row(): self;

    /**
     * @param int $width
     *
     * @return self
     */
    public function col(int $width = 12): self;

    /**
     * @return self
     */
    public function inputGroup(): self;

    /**
     * @param bool $fullWidth
     *
     * @return self
     */
    public function buttonGroup(bool $fullWidth): self;

    /**
     * @param int $flags
     *
     * @return self
     */
    public function button(int $flags = 0): self;

    /**
     * @param string $style
     *
     * @return self
     */
    public function panel(string $style = 'default'): self;

    /**
     * @return self
     */
    public function panelHeader(): self;

    /**
     * @return self
     */
    public function panelBody(): self;

    /**
     * @return self
     */
    public function panelFooter(): self;

    /**
     * @return self
     */
    public function menu(): self;

    /**
     * @return self
     */
    public function menuItem(): self;

    /**
     * @return self
     */
    public function menuActiveItem(): self;

    /**
     * @return self
     */
    public function menuDisabledItem(): self;

    /**
     * @return self
     */
    public function breadcrumb(): self;

    /**
     * @param bool $active
     *
     * @return self
     */
    public function breadcrumbItem(bool $active): self;

    /**
     * @param string $target The id of the tab content element
     *
     * @return self
     */
    public function tabNav(string $target = ''): self;

    /**
     * @param string $id
     * @param bool $active
     *
     * @return self
     */
    public function tabNavItem(string $id, bool $active = false): self;

    /**
     * @return self
     */
    public function tabContent(): self;

    /**
     * @param string $id
     * @param bool $active
     *
     * @return self
     */
    public function tabContentItem(string $id, bool $active = false): self;

    /**
     * @param bool $responsive
     * @param string $style
     *
     * @return self
     */
    public function table(bool $responsive, string $style = ''): self;

    /**
     * @param bool $horizontal
     * @param bool $wrapped
     *
     * @return self
     */
    public function form(bool $horizontal = false, bool $wrapped = false): self;

    /**
     * @return self
     */
    public function formRow(): self;

    /**
     * @param int $width
     *
     * @return self
     */
    public function formCol(int $width = 12): self;

    /**
     * @return string
     */
    public function formRowTag(): string;

    /**
     * @param string $class
     *
     * @return string
     */
    public function formRowClass(string $class = ''): string;

    /**
     * @param string $tagName
     * @param string $class
     *
     * @return string
     */
    public function formTagClass(string $tagName, string $class = ''): string;

    /**
     * @return self
     */
    public function dropdown(): self;

    /**
     * @param string $style
     *
     * @return self
     */
    public function dropdownItem(string $style = 'default'): self;

    /**
     * @return self
     */
    public function dropdownMenu(): self;

    /**
     * @return self
     */
    public function dropdownMenuItem(): self;

    /**
     * @return self
     */
    public function pagination(): self;

    /**
     * @return self
     */
    public function paginationItem(): self;

    /**
     * @return self
     */
    public function paginationActiveItem(): self;

    /**
     * @return self
     */
    public function paginationDisabledItem(): self;
}
