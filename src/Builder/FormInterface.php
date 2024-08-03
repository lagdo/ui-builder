<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface FormInterface
{
    /**
     * @param bool $horizontal
     * @param bool $wrapped
     *
     * @return BuilderInterface
     */
    public function form(bool $horizontal = false, bool $wrapped = false, ...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function formRow(...$arguments): BuilderInterface;

    /**
     * @param int $width
     *
     * @return BuilderInterface
     */
    public function formCol(int $width = 12, ...$arguments): BuilderInterface;

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
     * @return BuilderInterface
     */
    public function checkbox(bool $checked = false, ...$arguments): BuilderInterface;

    /**
     * @param bool $checked
     *
     * @return BuilderInterface
     */
    public function radio(bool $checked = false, ...$arguments): BuilderInterface;

    /**
     * @param bool $selected
     *
     * @return BuilderInterface
     */
    public function option(bool $selected = false, ...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function inputGroup(...$arguments): BuilderInterface;
}
