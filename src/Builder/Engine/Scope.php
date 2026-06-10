<?php

namespace Lagdo\UiBuilder\Builder\Engine;

use Lagdo\UiBuilder\Html\Builder\Scope as BaseScope;
use Lagdo\UiBuilder\Html\Element\Element;
use Lagdo\UiBuilder\HtmlComponent;

use function is_a;

/**
 * @extends BaseScope<HtmlComponent>
 */
class Scope extends BaseScope
{
    /**
     * @param HtmlComponent $parent
     */
    public function __construct(protected HtmlComponent $parent)
    {}

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

            // Allow the component libraries to react to the parent-child relation.
            $component->expanded($this->parent);

            $scope = new Scope($component);
            // Recursively build the component children.
            $scope->build($component->children());

            // Add the child component element and its siblings to the scope elements.
            $this->elements = [
                ...$this->elements,
                ...$component->build($scope->elements),
            ];
        }
    }
}
