<?php

namespace Lagdo\UiBuilder\Builder\Html;

use AvpLab\Element\Element as BaseElement;

use function implode;

class Scope
{
    /**
     * @var array<AbstractElement>
     */
    protected $children = [];

    /**
     * The constructor
     *
     * @param Element $parent
     * @param array<BaseElement> $children
     */
    public function __construct(protected Element $parent, protected array $elements = [])
    {}

    /**
     * Create the corresponding elements
     *
     * @param AbstractElement $element
     *
     * @return void
     */
    public function expand(AbstractElement $element): void
    {
        if (is_a($element, Element::class)) {
            $this->children[] = $element;
            return;
        }
        if (!is_a($element, ElementExpr::class)) {
            return;
        }

        // Recursively expand the children of the ElementExpr element.
        foreach ($element->children as $child) {
            $this->expand($child);
        }
    }

    /**
     * @param array $arguments
     *
     * @return void
     */
    public function build(array $arguments): void
    {
        foreach ($arguments as $argument) {
            $this->expand($argument);
        }

        foreach ($this->children as $child) {
            $child->onBuild($this->parent);

            // Recursively build the child scope.
            $scope = new Scope($child, $child->elements);
            $scope->build($child->children);

            // Generate the corresponding tag.
            $this->elements[] = new ElementTag($child, $scope->elements);
        }
    }

    /**
     * @return string
     */
    public function html(): string
    {
        // Merge all the generated tags.
        return implode('', $this->elements);
    }
}
