<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Builder\Engine\Engine;
use Lagdo\UiBuilder\Html\Element\Element;
use Lagdo\UiBuilder\Html\HtmlComponent as BaseComponent;
use Lagdo\UiBuilder\Html\HtmlElement;
use Closure;

use function get_class;
use function trim;

class HtmlComponent extends BaseComponent
{
    /**
     * @var HtmlComponent|null
     */
    private HtmlComponent|null $parent = null;

    /**
     * @var array
     */
    private $classes = []; // The base classes for the component.

    /**
     * @var array<Closure>
     */
    private array $builders = ['before' => [], 'after' => []];

    /**
     * @var array<HtmlElement>
     */
    private array $wrappers = [];

    /**
     * @var array<HtmlElement>
     */
    private array $prevSiblings = [];

    /**
     * @var array<HtmlElement>
     */
    private array $nextSiblings = [];

    /**
     * @var bool
     */
    private bool $forForm = false;

    /**
     * @param string $tagName
     * @param array $arguments
     */
    public function __construct(string $tagName, array $arguments = [])
    {
        parent::__construct($tagName, $arguments);

        $this->onCreate();
    }

    /**
     * @return Engine
     */
    protected function engine(): Engine
    {
        return $this->engine;
    }

    /**
     * Called on component creation.
     *
     * @return void
     */
    protected function onCreate(): void
    {}

    /**
     * Called after the parent is set, and the component is about to get built.
     *
     * @return void
     */
    protected function onBuild(): void
    {}

    /**
     * @param string $tagName
     * @param array $arguments
     *
     * @return HtmlElement
     */
    final protected function newElement(string $tagName, array $arguments = []): HtmlElement
    {
        return new HtmlElement($this, $tagName, $arguments);
    }

    /**
     * @param string $class
     *
     * @return static
     */
    public function addBaseClass(string $class): static
    {
        $this->classes[trim($class)] = true;
        return $this;
    }

    /**
     * @param Closure $builder
     * @param string $when
     *
     * @return static
     */
    final protected function addBuilder(Closure $builder, string $when = 'before'): static
    {
        $this->builders[$when][] = $builder;
        return $this;
    }

    /**
     * @return HtmlComponent|null
     */
    final protected function parent(): HtmlComponent|null
    {
        return $this->parent;
    }

    /**
     * Called for each child after a parent is expanded.
     *
     * @param HtmlComponent $parent
     *
     * @return void
     */
    final public function expanded(HtmlComponent $parent): void
    {
        $this->parent = $parent;
        $this->onBuild();

        // Call the deferred builders.
        foreach ($this->builders['before'] as $builder) {
            $builder();
        }
    }

    /**
     * @param array<Element> $children
     *
     * @return array<HtmlElement>
     */
    public function build(array $children): array
    {
        $element = $this->element()->addChildren($children);
        // Update the element classes.
        $element->setRawClasses($this->classes + $element->getRawClasses());
        // Nest the component element into its wrappers.
        foreach ($this->wrappers() as $wrapper) {
            $wrapper->addChild($element);
            $element = $wrapper;
        }

        // Call the deferred builders.
        foreach ($this->builders['after'] as $builder) {
            $builder();
        }

        return [
            ...$this->prevSiblings(),
            $element,
            ...$this->nextSiblings(),
        ];
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
        return $this->forForm || $this->engine()->inForm();
    }

    /**
     * @return array<HtmlElement>
     */
    public function wrappers(): array
    {
        return $this->wrappers;
    }

    /**
     * @return array<HtmlElement>
     */
    public function prevSiblings(): array
    {
        return $this->prevSiblings;
    }

    /**
     * @return array<HtmlElement>
     */
    public function nextSiblings(): array
    {
        return $this->nextSiblings;
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
     * @param HtmlElement $sibling
     *
     * @return static
     */
    protected function prependSibling(HtmlElement $sibling): static
    {
        $this->prevSiblings[] = $sibling;
        return $this;
    }

    /**
     * @param int $index
     *
     * @return HtmlElement|null
     */
    protected function prevSibling(int $index): HtmlElement|null
    {
        return $this->prevSiblings[$index] ?? null;
    }

    /**
     * @param HtmlElement $sibling
     *
     * @return static
     */
    protected function appendSibling(HtmlElement $sibling): static
    {
        $this->nextSiblings[] = $sibling;
        return $this;
    }

    /**
     * @param int $index
     *
     * @return HtmlElement|null
     */
    protected function nextSibling(int $index): HtmlElement|null
    {
        return $this->nextSiblings[$index] ?? null;
    }
}
