<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Builder\Engine\Engine;
use Lagdo\UiBuilder\Component\Html\Element;
use Lagdo\UiBuilder\Component\Html\Html;
use Lagdo\UiBuilder\Component\Html\Text;
use Closure;

use function get_class;
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
     * @var HtmlComponent|null
     */
    private HtmlComponent|null $parent = null;

    /**
     * @var HtmlElement
     */
    private HtmlElement $element;

    /**
     * @var array<HtmlElement>
     */
    private array $wrappers = [];

    /**
     * @var array<Element|Component>
     */
    private array $prevSiblings = [];

    /**
     * @var array<Element|Component>
     */
    private array $nextSiblings = [];

    /**
     * @var array<Element|Component>
     */
    private array $children = [];

    /**
     * @var array<Closure>
     */
    private array $builders = [];

    /**
     * @var bool
     */
    private bool $forForm = false;

    /**
     * @var array
     */
    protected array $properties = [];

    /**
     * @param Engine $engine
     * @param string $tagName
     * @param array $arguments
     */
    public function __construct(private Engine $engine, string $tagName, array $arguments = [])
    {
        $this->element = new HtmlElement($engine, $tagName ?: $this->tagName());
        // Resolve arguments
        $this->contents(...$arguments);

        $this->onCreate();
    }

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return '';
    }

    /**
     * @param string $tagName
     * @param array $arguments
     *
     * @return HtmlElement
     */
    final protected function newElement(string $tagName, array $arguments = []): HtmlElement
    {
        return new HtmlElement($this->engine, $tagName, $arguments);
    }

    /**
     * @return HtmlComponent|null
     */
    protected function parent(): HtmlComponent|null
    {
        return $this->parent;
    }

    /**
     * @return HtmlElement
     */
    public function element(): HtmlElement
    {
        return $this->element;
    }

    /**
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function prop(string $name, mixed $default = null): mixed
    {
        return $this->properties[$name] ?? $default;
    }

    /**
     * @param int $level
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function parentProp(int $level, string $name, mixed $default = null): mixed
    {
        $parent = $this;
        while ($parent->parent() !== null && $level-- > 0) {
            $parent = $parent->parent();
        }
        return $parent->prop($name, $default);
    }

    /**
     * @return string
     */
    protected function parentClass(): string
    {
        $parent = $this->parent();
        return $parent === null ? '' : get_class($parent);
    }

    /**
     * Called for each child after a parent is expanded.
     *
     * @param HtmlComponent $parent
     *
     * @return static
     */
    final public function expanded(HtmlComponent $parent): static
    {
        $this->parent = $parent;
        $this->onBuild();
        // Call the deferred builders.
        foreach ($this->builders as $builder) {
            $builder();
        }
        return $this;
    }

    /**
     * @param Closure $builder
     *
     * @return static
     */
    final protected function addBuilder(Closure $builder): static
    {
        $this->builders[] = $builder;
        return $this;
    }

    /**
     * @return static
     */
    public function forForm(): static
    {
        $this->forForm = true;
        return $this;
    }

    /**
     * @return bool
     */
    protected function inForm(): bool
    {
        return $this->forForm || $this->engine->inForm();
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
     * @return array<HtmlElement>
     */
    public function wrappers(): array
    {
        return $this->wrappers;
    }

    /**
     * @return array<Element|Component>
     */
    public function prevSiblings(): array
    {
        return $this->prevSiblings;
    }

    /**
     * @return array<Element|Component>
     */
    public function nextSiblings(): array
    {
        return $this->nextSiblings;
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
    public function addClass(string $class): static
    {
        $this->element->addClass($class);
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
        return $this->addClass($class);
    }

    /**
     * @param string $class
     *
     * @return static
     */
    public function removeClass(string $class): static
    {
        $this->element->removeClass($class);
        return $this;
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function hasClass(string $class): bool
    {
        return $this->element->hasClass($class);
    }

    /**
     * @param string $name
     * @param string|bool $value
     * @param bool $escape
     *
     * @return static
     */
    public function setAttribute(string $name, string|bool $value = true, bool $escape = true): static
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
     *
     * @return bool
     */
    public function hasAttribute(string $name): bool
    {
        return $this->element->hasAttribute($name);
    }

    /**
     * @param string $name
     *
     * @return string|bool
     */
    public function getAttribute(string $name): string|bool
    {
        return $this->element->getAttribute($name);
    }

    /**
     * @param string $name
     *
     * @return static
     */
    public function removeAttribute(string $name): static
    {
        $this->element->removeAttribute($name);
        return $this;
    }

    /**
     * @param HtmlElement $wrapper
     *
     * @return static
     */
    protected function addWrapper(HtmlElement $wrapper): static
    {
        $this->wrappers[] = $wrapper;
        return $this;
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
     * @param Element|Component $sibling
     *
     * @return static
     */
    protected function prependSibling(Element|Component $sibling): static
    {
        $this->prevSiblings[] = $sibling;
        return $this;
    }

    /**
     * @param int $index
     *
     * @return Element|Component|null
     */
    protected function prevSibling(int $index): Element|Component|null
    {
        return $this->prevSiblings[$index] ?? null;
    }

    /**
     * @param Element|Component $sibling
     *
     * @return static
     */
    protected function appendSibling(Element|Component $sibling): static
    {
        $this->nextSiblings[] = $sibling;
        return $this;
    }

    /**
     * @param int $index
     *
     * @return Element|Component|null
     */
    protected function nextSibling(int $index): Element|Component|null
    {
        return $this->nextSiblings[$index] ?? null;
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

    /**
     * @return static
     */
    public function disable(): static
    {
        $this->element()->setAttribute('disabled', 'disabled');
        return $this;
    }
}
