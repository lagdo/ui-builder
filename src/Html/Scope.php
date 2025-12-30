<?php

namespace Lagdo\UiBuilder\Html;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Base\HtmlElement;
use Lagdo\UiBuilder\Component\Html\Element;
use Lagdo\UiBuilder\Component\Virtual\VirtualComponent;

use function is_a;
use function implode;

class Scope
{
    /**
     * @var array<Element>
     */
    protected $elements = [];

    /**
     * @var array<Element|HtmlComponent>
     */
    protected $children = [];

    /**
     * The constructor
     *
     * @param HtmlComponent $parent
     */
    public function __construct(protected HtmlComponent $parent)
    {}

    /**
     * Create the corresponding components
     *
     * @param mixed $component
     *
     * @return void
     */
    private function expand(mixed $component): void
    {
        if (is_a($component, Element::class) ||
            is_a($component, HtmlComponent::class)) {
            $this->children[] = $component;
            return;
        }

        if (is_a($component, VirtualComponent::class)) {
            // Recursively expand the children of the virtual components.
            foreach ($component->children() as $childElement) {
                $this->expand($childElement);
            }
        }
    }

    /**
     * @param HtmlComponent $component
     * @param array<Element> $children
     *
     * @return HtmlElement
     */
    public function getElement(HtmlComponent $component, array $children): HtmlElement
    {
        $element = $component->element();
        $element->addChildren($children);
        // Nest the component element into its wrappers elements.
        foreach ($component->wrappers() as $wrapper) {
            $wrapper->addChild($element);
            $element = $wrapper;
        }

        return $element;
    }

    /**
     * @param array $arguments The arguments passed to the component
     *
     * @return void
     */
    public function build(array $arguments): void
    {
        foreach ($arguments as $argument) {
            $this->expand($argument);
        }

        foreach ($this->children as $component) {
            if (is_a($component, Element::class)) {
                // A children of type Element doesn't need any further processing.
                $this->elements[] = $component;
                continue;
            }

            // The component is an instance of HtmlComponent.
            // Allow the component libraries to react to the parent-child relation.
            $component->expanded($this->parent);

            $scope = new Scope($component);
            // Recursively build the component children.
            $scope->build($component->children());

            // Add the child component element to the scope elements.
            $this->elements[] = $this->getElement($component, $scope->elements);
        }
    }

    /**
     * @return string
     */
    public function html(): string
    {
        // Merge all the generated elements.
        return implode('', $this->elements);
    }
}
