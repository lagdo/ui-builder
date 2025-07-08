<?php

namespace Lagdo\UiBuilder\Builder\Html;

use AvpLab\Element\Comment;
use AvpLab\Element\Element as Block;
use AvpLab\Element\Text;
use Lagdo\UiBuilder\Element\ElementInterface;
use Closure;

use function is_array;
use function is_string;
use function trim;

class Element extends AbstractElement implements ElementInterface
{
    /**
     * @var array
     */
    public $attributes = [];

    /**
     * @var array
     */
    public $classes = [[]]; // In the first entry are the element base classes.

    /**
     * @var array
     */
    public $escapes = [];

    /**
     * @var array<Block>
     */
    public $blocks = [];

    /**
     * @var array<AbstractElement>
     */
    public $children = [];

    /**
     * @var array
     */
    public $wrappers = [];

    /**
     * The constructor
     *
     * @param HtmlBuilder $builder
     * @param string $name
     * @param array $arguments
     */
    public function __construct(public HtmlBuilder $builder,
        public string $name, array $arguments = [])
    {
        // Resolve arguments
        foreach ($arguments as $argument) {
            if (is_string($argument)) {
                $this->blocks[] = new Text($argument, false);
            } elseif (is_array($argument)) {
                $this->setAttributes($argument);
            }
        }

        $this->onCreate();

        // The arguments can also contain the list of child elements.
        $this->children(...$arguments);
    }

    /**
     * @return static
     */
    public function children(...$arguments): static
    {
        $this->children = $arguments;
        return $this;
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return static
     */
    public function __call(string $method, array $arguments): static
    {
        $this->builder->make($method, $arguments, $this);
        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @param bool $escape
     *
     * @return static
     */
    public function setAttribute(string $name, string $value, bool $escape = true): static
    {
        $this->attributes[$name] = $value;
        $this->escapes[$name] = $escape;
        return $this;
    }

    /**
     * @param array $attributes
     * @param bool $escape
     *
     * @return static
     */
    public function setAttributes(array $attributes, bool $escape = true): static
    {
        foreach ($attributes as $name => $value) {
            if (is_string($value)) {
                $this->setAttribute($name, $value, $escape);
            }
        }
        return $this;
    }

    /**
     * Append a class to the existing one.
     *
     * @param string $class
     *
     * @return static
     */
    public function addClass(string $class): static
    {
        $this->classes[] = trim($class);
        return $this;
    }

    /**
     * Prepend a class to the existing one.
     *
     * @param string $class
     *
     * @return static
     */
    public function addBaseClass(string $class): static
    {
        $this->classes[0][] = trim($class);
        return $this;
    }

    /**
     * @param string $class
     *
     * @return static
     */
    public function setClass(string $class): static
    {
        // Actually appends the class.
        $this->addClass($class);
        return $this;
    }

    /**
     * @param Block $block
     *
     * @return static
     */
    protected function addBlock(Block $block): static
    {
        $this->blocks[] = $block;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addText(string $text): static
    {
        $this->addBlock(new Text($text));
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addHtml(string $html): static
    {
        $this->addBlock(new Text($html, false));
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addComment(string $comment): static
    {
        $this->addBlock(new Comment($comment));
        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return void
     */
    protected function addWrapper(string $name, array $arguments = [])
    {
        $wrapper = $this->builder->createElement($name, [$arguments]);
        $this->wrappers[] = $wrapper;
        return $wrapper;
    }

    /**
     * @param int $index
     * @param string $class
     *
     * @return static
     */
    protected function setWrapperClass(int $index, string $class): static
    {
        $this->wrappers[$index]?->setClass($class);
        return $this;
    }

    /**
     * @param int $index
     * @param string $name
     * @param string $value
     *
     * @return static
     */
    public function setWrapperAttribute(int $index, string $name, string $value): static
    {
        $this->wrappers[$index]?->setAttribute($name, $value);
        return $this;
    }

    /**
     * @param int $index
     * @param array $attributes
     *
     * @return static
     */
    public function setWrapperAttributes(int $index, array $attributes): static
    {
        $this->wrappers[$index]?->setAttributes($attributes);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function when(bool $condition, Closure $closure): static
    {
        $condition && $closure($this);
        return $this;
    }
}
