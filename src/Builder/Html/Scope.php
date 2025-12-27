<?php

namespace Lagdo\UiBuilder\Builder\Html;

use Lagdo\UiBuilder\Builder\Html\Tag\AbstractTag;

use function is_a;
use function implode;

class Scope
{
    /**
     * @var array<AbstractTag|ElementTag>
     */
    protected $tags = [];

    /**
     * @var array<Element>
     */
    protected $children = [];

    /**
     * The constructor
     *
     * @param Element $parent
     */
    public function __construct(protected Element $parent)
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
        if (is_a($element, AbstractTag::class) || is_a($element, Element::class)) {
            $this->children[] = $element;
            return;
        }

        if (is_a($element, ElementExpr::class)) {
            // Recursively expand the children of the ElementExpr element.
            foreach ($element->children as $childElement) {
                $this->expand($childElement);
            }
        }
    }

    /**
     * @param Element $element
     * @param Scope $scope
     *
     * @return ElementTag
     */
    private function createTag(Element $element, Scope $scope): ElementTag
    {
        $tag = new ElementTag($element, $scope->tags);
        foreach ($element->wrappers as $wrapper) {
            $tag = new ElementTag($wrapper, [$tag]);
        }
        return $tag;
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
            if (is_a($element, AbstractTag::class)) {
                // A children of type AbstractTag doesn't need any further processing.
                $this->tags[] = $element;
                continue;
            }

            $element->onBuild($this->parent);

            // Recursively build the child scope.
            $scope = new Scope($element);
            $scope->build($element->children);

            // Generate the corresponding tag.
            $this->tags[] = $this->createTag($element, $scope);
        }
    }

    /**
     * @return string
     */
    public function html(): string
    {
        // Merge all the generated tags.
        return implode('', $this->tags);
    }
}
