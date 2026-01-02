<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Lagdo\UiBuilder\Component\Component;
use Closure;

use function is_a;

class WhenComponent extends VirtualComponent
{
    /**
     * The constructor
     *
     * @param bool $condition
     * @param Closure|Component $element
     */
    public function __construct(bool $condition, Closure|Component $element)
    {
        if (!$condition) {
            return;
        }

        if (is_a($element, Closure::class)) {
            $element = $element();
        }
        if ($element !== null) {
            $this->children[] = $element;
        }
    }
}
