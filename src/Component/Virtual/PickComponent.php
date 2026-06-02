<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Lagdo\UiBuilder\Component\Component;
use Lagdo\UiBuilder\Component\Html\Element;

use function array_filter;
use function count;
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
        foreach ($this->choices as [$condition, $element]) {
            if ($condition) {
                if (is_callable($element)) {
                    $element = $element();
                }

                // The function returns once a condition is matched.
                return $element !== null ? [$element] : $element;
            }
        }

        return [];
    }
}
