<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Lagdo\UiBuilder\Component\Base\Component;
use Closure;

use function is_callable;

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

        if (is_callable($element)) {
            $element = $element();
        }
        if ($element !== null) {
            $this->children[] = $element;
        }
    }
}
