<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Builder\Html\HtmlBuilder;
use Lagdo\UiBuilder\Html\HtmlElement;
use Lagdo\UiBuilder\Html\Text;
use Closure;

use function is_array;
use function is_string;
use function trim;

/**
 * @method static setId(string $id)
 * @method static setClass(string $class)
 * @method static setFor(string $for)
 * @method static setName(string $name)
 * @method static setValue(string $value)
 * @method static setType(string $type)
 * @method static setTitle(string $type)
 * @method static setStyle(string $type)
 */
class HtmlComponent extends Component implements HtmlComponentInterface
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
     * @var array<Component>
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
        $children = [];
        // Resolve arguments
        foreach ($arguments as $argument) {
            if (is_array($argument)) {
                $this->setAttributes($argument);
                continue;
            }

            $children[] = is_string($argument) ? new Text($argument, false) : $argument;
        }

        $this->onCreate();

        // The arguments can also contain the list of child elements.
        $this->children(...$children);
    }

    /**
     * @return static
     */
    public function children(...$children): static
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function child(HtmlElement|HtmlComponent $child): static
    {
        $this->children[] = $child;
        return $this;
    }

    /**
     * @param string $text
     *
     * @return static
     */
    protected function addText(string $text): static
    {
        $this->children[] = new Text($text);
        return $this;
    }

    /**
     * @param string $html
     *
     * @return static
     */
    protected function addHtml(string $html): static
    {
        $this->children[] = new Text($html, false);
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
     * @inheritDoc
     */
    public function setAttribute(string $name, string $value, bool $escape = true): static
    {
        $this->attributes[$name] = $value;
        $this->escapes[$name] = $escape;
        return $this;
    }

    /**
     * @inheritDoc
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
     * @inheritDoc
     */
    public function addClass(string $class): static
    {
        $this->classes[] = trim($class);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addBaseClass(string $class): static
    {
        $this->classes[0][] = trim($class);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function setClass(string $class): static
    {
        // Actually appends the class.
        $this->addClass($class);
        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return HtmlComponent
     */
    protected function addWrapper(string $name, array $arguments = []): HtmlComponent
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
