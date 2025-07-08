<?php

namespace Lagdo\UiBuilder\Builder\Html;

use AvpLab\Element\Element as Block;

use function is_a;
use function implode;

class Scope
{
    /**
     * @var array<Element>
     */
    protected $children = [];

    /**
     * The constructor
     *
     * @param Element $parent
     * @param array<Block> $blocks
     */
    public function __construct(protected Element $parent, protected array $blocks = [])
    {}

    /**
     * Create the corresponding elements
     *
     * @param mixed $element
     *
     * @return void
     */
    private function expand(mixed $element): void
    {
        if (is_a($element, Element::class)) {
            $this->children[] = $element;
            return;
        }
        if (!is_a($element, ElementExpr::class)) {
            return;
        }

        // Recursively expand the children of the ElementExpr element.
        foreach ($element->children as $childElement) {
            $this->expand($childElement);
        }
    }

    /**
     * @param Element $element
     * @param Scope $scope
     *
     * @return ElementBlock
     */
    private function createBlock(Element $element, Scope $scope): ElementBlock
    {
        $block = new ElementBlock($element, $scope->blocks);
        foreach ($element->wrappers as $wrapper) {
            $block = new ElementBlock($wrapper, [$block]);
        }
        return $block;
    }

    /**
     * @param array $arguments The arguments passed to the element
     *
     * @return void
     */
    public function build(array $arguments): void
    {
        foreach ($arguments as $argument) {
            $this->expand($argument);
        }

        foreach ($this->children as $element) {
            $element->onBuild($this->parent);

            // Recursively build the child scope.
            $scope = new Scope($element, $element->blocks);
            $scope->build($element->children);

            // Generate the corresponding tag.
            $this->blocks[] = $this->createBlock($element, $scope);
        }
    }

    /**
     * @return string
     */
    public function html(): string
    {
        // Merge all the generated tags.
        return implode('', $this->blocks);
    }
}
