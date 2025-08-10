<?php

namespace Lagdo\UiBuilder\Element;

use Closure;

/**
 * @method static setId(string $id)
 * @method static setClass(string $class)
 * @method static setFor(string $for)
 * @method static setName(string $name)
 * @method static setValue(string $value)
 * @method static setType(string $type)
 */
interface ElementInterface
{
    /**
     * @param string $name
     * @param string $value
     *
     * @return static
     */
    public function setAttribute(string $name, string $value): static;

    /**
     * @param array $attributes
     *
     * @return static
     */
    public function setAttributes(array $attributes): static;

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
     * @param string $text
     *
     * @return static
     */
    public function addText(string $text): static;

    /**
     * @param string $html
     *
     * @return static
     */
    public function addHtml(string $html): static;

    /**
     * @param string $comment
     *
     * @return static
     */
    public function addComment(string $comment): static;

    /**
     * @return static
     */
    public function children(...$arguments): static;

    /**
     * @param bool $condition
     * @param Closure $closure
     *
     * @return void
     */
    public function when(bool $condition, Closure $closure): static;
}
