<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Html\HtmlElement;

use Closure;

interface HtmlComponentInterface
{
    /**
     * @param string $name
     * @param string $value
     * @param bool $escape
     *
     * @return static
     */
    public function setAttribute(string $name, string $value, bool $escape = true): static;

    /**
     * @param array $attributes
     * @param bool $escape
     *
     * @return static
     */
    public function setAttributes(array $attributes, bool $escape = true): static;

    /**
     * Append a class to the existing one.
     *
     * @param string $class
     *
     * @return static
     */
    public function addClass(string $class): static;

    /**
     * Prepend a class to the existing one.
     *
     * @param string $class
     *
     * @return static
     */
    public function addBaseClass(string $class): static;

    /**
     * @param string $class
     *
     * @return static
     */
    public function setClass(string $class): static;

    /**
     * @return static
     */
    public function children(...$arguments): static;

    /**
     * @param HtmlElement|HtmlComponent $element
     *
     * @return static
     */
    public function child(HtmlElement|HtmlComponent $element): static;

    /**
     * @param bool $condition
     * @param Closure $closure
     *
     * @return void
     */
    public function when(bool $condition, Closure $closure): static;
}
