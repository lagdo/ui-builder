<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Html\Element;
use Lagdo\UiBuilder\Component\Html\Html;
use Lagdo\UiBuilder\Component\Html\Text;
use Lagdo\UiBuilder\Engine\Engine;
use Closure;

use function is_array;
use function is_string;

/**
 * @method static setId(string $id, bool $escape = true)
 * @method static setClass(string $class, bool $escape = true)
 * @method static setFor(string $for, bool $escape = true)
 * @method static setName(string $name, bool $escape = true)
 * @method static setValue(string $value, bool $escape = true)
 * @method static setType(string $type, bool $escape = true)
 * @method static setTitle(string $type, bool $escape = true)
 * @method static setStyle(string $type, bool $escape = true)
 */
class HtmlComponent extends Component
{
    /**
     * @var HtmlElement
     */
    private $element;

    /**
     * @var array<HtmlElement>
     */
    private $wrappers = [];

    /**
     * @var array<Element|Component>
     */
    private $children = [];

    /**
     * The constructor
     *
     * @param Engine $engine
     * @param string $name
     * @param array $arguments
     */
    public function __construct(private Engine $engine, string $name, array $arguments = [])
    {
        $this->element = new HtmlElement($engine, $name);

        // Resolve arguments
        $this->contents(...$arguments);

        $this->onCreate();
    }

    /**
     * Called for each child after a perent is expanded.
     *
     * @param HtmlComponent $parent
     *
     * @return static
     */
    final public function expanded(HtmlComponent $parent): static
    {
        $this->onBuild($parent);
        return $this;
    }

    /**
     * @return static
     */
    public function contents(...$arguments): static
    {
        // Resolve arguments
        foreach ($arguments as $argument) {
            switch (true) {
            case is_array($argument):
                $this->element->setAttributes($argument);
                break;
            case is_string($argument):
                $this->children[] = new Html($argument);
                break;
            case is_a($argument, Element::class):
            case is_a($argument, Component::class):
                $this->children[] = $argument;
            }
        }
        return $this;
    }

    /**
     * @return HtmlElement
     */
    public function element(): HtmlElement
    {
        return $this->element;
    }

    /**
     * @return array<HtmlElement>
     */
    public function wrappers(): array
    {
        return $this->wrappers;
    }

    /**
     * @return array<Element|Component>
     */
    public function children(): array
    {
        return $this->children;
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
        $this->children[] = new Html($html);
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
        $this->engine->callComponentHelper($this, $method, $arguments);
        return $this;
    }

    /**
     * @param string $class
     *
     * @return static
     */
    public function setClass(string $class): static
    {
        // Must actually append the class.
        $this->element->addClass($class);
        return $this;
    }

    /**
     * @param string $class
     *
     * @return static
     */
    public function addClass(string $class): static
    {
        return $this->setClass($class);
    }

    /**
     * @param string $name
     * @param string|null $value
     * @param bool $escape
     *
     * @return static
     */
    public function setAttribute(string $name, string|null $value = null, bool $escape = true): static
    {
        $this->element->setAttribute($name, $value, $escape);
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
        $this->element->setAttributes($attributes, $escape);
        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return HtmlElement
     */
    protected function addWrapper(string $name, array $arguments = []): HtmlElement
    {
        $wrapper = new HtmlElement($this->engine, $name, $arguments);
        $this->wrappers[] = $wrapper;
        return $wrapper;
    }

    /**
     * @param int $index
     *
     * @return HtmlElement|null
     */
    protected function wrapper(int $index): HtmlElement|null
    {
        return $this->wrappers[$index] ?? null;
    }

    /**
     * @param bool $condition
     * @param Closure $closure
     *
     * @return static
     */
    public function when(bool $condition, Closure $closure): static
    {
        $condition && $closure($this);
        return $this;
    }

    /**
     * @param Closure $closure
     *
     * @return static
     */
    public function with(Closure $closure): static
    {
        $closure($this);
        return $this;
    }
}
