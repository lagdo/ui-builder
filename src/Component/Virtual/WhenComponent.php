<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Lagdo\UiBuilder\Component\Component;
use Lagdo\UiBuilder\Component\Html\Element;
use Closure;

use function is_a;

class WhenComponent extends VirtualComponent
{
    /**
     * @param bool $condition
     * @param Closure|Component $element
     */
    public function __construct(private bool $condition,
        private Closure|Component $element)
    {}

    /**
     * @return array<Element|Component>
     */
    public function children(): array
    {
        if (!$this->condition) {
            return [];
        }

        $element = is_a($this->element, Closure::class) ?
            ($this->element)() : $this->element;
        return $element !== null ? [$element] : [];
    }
}
