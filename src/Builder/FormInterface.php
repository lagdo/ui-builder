<?php

namespace Lagdo\UiBuilder\Builder;

interface FormInterface
{
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
}
