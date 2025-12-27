<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use function is_callable;

class TakeComponent extends VirtualComponent
{
    /**
     * The constructor
     *
     * @param array $choices
     */
    public function __construct(array $choices)
    {
        foreach ($choices as [$condition, $element]) {
            if ($condition) {
                if (is_callable($element)) {
                    $element = $element();
                }
                if ($element !== null) {
                    $this->children[] = $element;
                }
                // The function exits once a condition is matched.
                return;
            }
        }
    }
}
