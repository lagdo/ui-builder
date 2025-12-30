<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\Html\Element;
use Lagdo\UiBuilder\Html\HtmlBuilder;

use function htmlspecialchars;
use function implode;
use function is_numeric;
use function is_string;
use function sprintf;
use function trim;

/**
 * The HTML tags finally generated for a given component
 */
class HtmlElement extends Element
{
    /**
     * @var bool
     */
    private $isShort = false;

    /**
     * @var bool
     */
    private $isOpened = false;

    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @var array
     */
    private $escapes = [];

    /**
     * @var array
     */
    private $baseClasses = []; // The component classes.

    /**
     * @var array
     */
    private $classes = []; // The additional classes.

    /**
     * @var array<Element>
     */
    private $children = [];

    /**
     * @param HtmlBuilder $builder
     * @param string $tag
     * @param array $attributes
     */
    public function __construct(private HtmlBuilder $builder, private string $tag, array $attributes = [])
    {
        $this->setAttributes($attributes);
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return static
     */
    public function __call(string $method, array $arguments): static
    {
        $this->builder->callElementFactory($this, $method, $arguments);
        return $this;
    }

    /**
     * @param string $tag
     *
     * @return void
     */
    public function setTag(string $tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @param array<Element> $children
     *
     * @return void
     */
    public function setChildren(array $children): void
    {
        $this->children = $children;
    }

    /**
     * @param array<Element> $children
     *
     * @return void
     */
    public function addChildren(array $children): void
    {
        $this->children = [...$this->children, ...$children];
    }

    /**
     * @param Element $child
     *
     * @return void
     */
    public function addChild(Element $child): void
    {
        $this->children[] = $child;
    }

    /**
     * @param string $class
     *
     * @return void
     */
    public function addBaseClass(string $class): void
    {
        $this->baseClasses[] = trim($class);
    }

    /**
     * @param int $index
     * @param string $class
     *
     * @return void
     */
    public function setBaseClass(int $index, string $class): void
    {
       $this->baseClasses[$index] = trim($class);
    }

    /**
     * @param string $class
     *
     * @return void
     */
    public function addClass(string $class): void
    {
        $this->classes[] = trim($class);
    }

    /**
     * @param string $class
     *
     * @return void
     */
    public function setClass(string $class): void
    {
        // Actually appends the class.
        $this->addClass($class);
    }

    /**
     * @param bool $isShort
     *
     * @return void
     */
    public function setShort($isShort): void
    {
        $this->isShort = $isShort;
    }

    /**
     * @param bool $isOpened
     *
     * @return void
     */
    public function setOpened($isOpened): void
    {
        $this->isOpened = $isOpened;
    }

    /**
     * @param string $name
     * @param string|null $value
     * @param bool $escape
     *
     * @return void
     */
    public function setAttribute(string $name, string|null $value = null, bool $escape = true): void
    {
        $this->attributes[$name] = $value;
        $this->escapes[$name] = $escape;
    }

    /**
     * @param array $attributes
     * @param bool $escape
     *
     * @return void
     */
    public function setAttributes(array $attributes, bool $escape = true): void
    {
        foreach ($attributes as $name => $value) {
            switch (true) {
            case is_numeric($name):
                $this->setAttribute($value);
                break;
            case is_string($value):
                $this->setAttribute($name, $value, $escape);
                break;
            default: // Any other values are ignored.
            }
        }
    }

    /**
     * @return string
     */
    private function renderAttributes(): string
    {
        // Merge the classes.
        $classes = [...$this->baseClasses, ...$this->classes];
        if (isset($this->attributes['class'])) {
            $classes[] = $this->attributes['class'];
        }
        if (($class = trim(implode(' ', $classes))) !== '') {
            $this->attributes['class'] = $class;
        }

        $attributes = [];
        foreach ($this->attributes as $name => $value) {
            $name = $this->escape($name);
            if ($value !== null && ($this->escapes[$name] ?? true) === true) {
                $value = $this->escape($value);
            }
            $attributes[] = $value !== null ? "$name=\"$value\"" : $name;
        }

        return !$attributes ? '' : ' ' . implode(' ', $attributes);
    }

    /**
     * @return string
     */
    private function renderShort(): string
    {
        return sprintf('<%s%s />', $this->tag, $this->renderAttributes());
    }

    /**
     * @return string
     */
    private function renderOpened(): string
    {
        return sprintf('<%s%s>', $this->tag, $this->renderAttributes());
    }

    /**
     * @return string
     */
    private function renderTag(): string
    {
        $children = implode('', $this->children);
        return sprintf('%s%s</%s>', $this->renderOpened(), $children, $this->tag);
    }

    /**
     * @param $value
     *
     * @return string
     */
    private function escape($value): string
    {
        return htmlspecialchars($value, ENT_COMPAT);
    }

    /**
     * @inheritDoc
     */
    protected function render(): string
    {
        return match(true) {
            $this->isShort => $this->renderShort(),
            $this->isOpened => $this->renderOpened(),
            default => $this->renderTag(),
        };
    }
}
