<?php

namespace Lagdo\UiBuilder\Element;

use Closure;

/**
 * @method ElementInterface setId(string $id)
 * @method ElementInterface setClass(string $class)
 * @method ElementInterface setFor(string $for)
 * @method ElementInterface setName(string $name)
 * @method ElementInterface setValue(string $value)
 * @method ElementInterface setType(string $type)
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
    public function appendClass(string $class): static;

    /**
     * Prepend a class to the existing one.
     *
     * @param string $class
     *
     * @return static
     */
    public function prependClass(string $class): static;

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
