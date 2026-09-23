<?php

namespace Lagdo\UiBuilder\Builder\Engine;

use Lagdo\HtmlBuilder\Builder\Scope as BaseScope;
use Lagdo\HtmlBuilder\Element\Element;
use Lagdo\HtmlBuilder\HtmlComponent as BaseComponent;
use Lagdo\UiBuilder\HtmlComponent;

use function is_a;

class Scope extends BaseScope implements ScopeInterface
{
    /**
     * @param BaseComponent $parent
     * @param bool $inForm
     */
    public function __construct(protected BaseComponent $parent, private bool $inForm)
    {}

    /**
     * @return BaseComponent
     */
    public function parent(): BaseComponent
    {
        return $this->parent;
    }

    /**
     * @return bool
     */
    public function inForm(): bool
    {
        return $this->inForm;
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

        $this->inForm = $this->inForm || $this->parent->element()->tag() === 'form';

        foreach ($this->children as $component) {
            if (is_a($component, Element::class)) {
                // A children of type Element doesn't need any further processing.
                $this->elements[] = $component;
                continue;
            }

            // Allow the component libraries to react to the parent-child relation.
            // This function exists only in the UiBuilder HtmlComponent class.
            if (is_a($component, HtmlComponent::class)) {
                $component->expanded($this);
            }

            $scope = new Scope($component, $this->inForm);
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
