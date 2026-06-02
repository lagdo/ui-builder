<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Lagdo\UiBuilder\Component\Component;
use Lagdo\UiBuilder\Component\Html\Element;

use function is_a;

class PickComponent extends VirtualComponent
{
    /**
     * @param array $choices
     */
    public function __construct(private array $choices)
    {}

    /**
     * @return array<Element|Component>
     */
    public function children(): array
    {
        foreach ($this->choices as $choice) {
            if (is_a($choice, WhenComponent::class) && $choice->matches()) {
                return $choice->children();
            }
        }

        return [];
    }
}
