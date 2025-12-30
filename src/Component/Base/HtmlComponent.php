<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\Html\Element;
use Lagdo\UiBuilder\Component\Html\Html;
use Lagdo\UiBuilder\Component\Html\Text;
use Lagdo\UiBuilder\Html\HtmlBuilder;
use Closure;

use function is_array;
use function is_string;

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
     * @param HtmlBuilder $builder
     * @param string $name
     * @param array $arguments
     */
    public function __construct(private HtmlBuilder $builder, string $name, array $arguments = [])
    {
        $this->element = new HtmlElement($builder, $name);

        // Resolve arguments
        $this->props(...$arguments);

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
    public function props(...$arguments): static
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
        $this->builder->callComponentFactory($this, $method, $arguments);
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
     * @param string $name
     * @param array $arguments
     *
     * @return HtmlElement
     */
    protected function addWrapper(string $name, array $arguments = []): HtmlElement
    {
        $wrapper = new HtmlElement($this->builder, $name, $arguments);
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
     * @inheritDoc
     */
    public function when(bool $condition, Closure $closure): static
    {
        $condition && $closure($this);
        return $this;
    }
}
