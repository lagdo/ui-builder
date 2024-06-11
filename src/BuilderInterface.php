<?php

namespace Lagdo\UiBuilder;

/**
 * @method BuilderInterface clear()
 * @method BuilderInterface setId(string $id)
 * @method BuilderInterface setClass(string $class)
 * @method BuilderInterface setFor(string $for)
 * @method BuilderInterface setName(string $name)
 * @method BuilderInterface setValue(string $value)
 * @method BuilderInterface setType(string $type)
 * @method BuilderInterface setOnClick(string $code)
 * @method BuilderInterface addText(string $text)
 * @method BuilderInterface addHtml(string $html)
 * @method BuilderInterface div()
 * @method BuilderInterface span()
 * @method BuilderInterface label()
 * @method BuilderInterface end()
 * @method BuilderInterface input()
 * @method BuilderInterface formInput()
 * @method BuilderInterface formSelect()
 * @method BuilderInterface formTextArea()
 * @method string build()
 */
interface BuilderInterface
{
    /**
     * @param string $icon
     *
     * @return BuilderInterface
     */
    public function addIcon(string $icon): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function addCaret(): BuilderInterface;

    /**
     * @param bool $checked
     *
     * @return BuilderInterface
     */
    public function checkbox(bool $checked = false): BuilderInterface;

    /**
     * @param bool $checked
     *
     * @return BuilderInterface
     */
    public function radio(bool $checked = false): BuilderInterface;

    /**
     * @param bool $selected
     *
     * @return BuilderInterface
     */
    public function option(bool $selected = false): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function text(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function row(): BuilderInterface;

    /**
     * @param int $width
     *
     * @return BuilderInterface
     */
    public function col(int $width = 12): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function inputGroup(): BuilderInterface;

    /**
     * @param bool $fullWidth
     *
     * @return BuilderInterface
     */
    public function buttonGroup(bool $fullWidth): BuilderInterface;

    /**
     * @param int $flags
     *
     * @return BuilderInterface
     */
    public function button(int $flags = 0): BuilderInterface;

    /**
     * @param string $style
     *
     * @return BuilderInterface
     */
    public function panel(string $style = 'default'): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function panelHeader(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function panelBody(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function panelFooter(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function menu(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function menuItem(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function menuActiveItem(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function menuDisabledItem(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function breadcrumb(): BuilderInterface;

    /**
     * @param bool $active
     *
     * @return BuilderInterface
     */
    public function breadcrumbItem(bool $active): BuilderInterface;

    /**
     * @param string $target The id of the tab content element
     *
     * @return BuilderInterface
     */
    public function tabNav(string $target = ''): BuilderInterface;

    /**
     * @param string $id
     * @param bool $active
     *
     * @return BuilderInterface
     */
    public function tabNavItem(string $id, bool $active = false): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function tabContent(): BuilderInterface;

    /**
     * @param string $id
     * @param bool $active
     *
     * @return BuilderInterface
     */
    public function tabContentItem(string $id, bool $active = false): BuilderInterface;

    /**
     * @param bool $responsive
     * @param string $style
     *
     * @return BuilderInterface
     */
    public function table(bool $responsive, string $style = ''): BuilderInterface;

    /**
     * @param bool $horizontal
     * @param bool $wrapped
     *
     * @return BuilderInterface
     */
    public function form(bool $horizontal = false, bool $wrapped = false): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function formRow(): BuilderInterface;

    /**
     * @param int $width
     *
     * @return BuilderInterface
     */
    public function formCol(int $width = 12): BuilderInterface;

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
     * @return BuilderInterface
     */
    public function dropdown(): BuilderInterface;

    /**
     * @param string $style
     *
     * @return BuilderInterface
     */
    public function dropdownItem(string $style = 'default'): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function dropdownMenu(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function dropdownMenuItem(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function pagination(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function paginationItem(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function paginationActiveItem(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function paginationDisabledItem(): BuilderInterface;
}
