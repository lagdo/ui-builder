<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Lagdo\UiBuilder\Component\Component;
use Lagdo\UiBuilder\Component\Html\Element;

class ListComponent extends VirtualComponent
{
    /**
     * @param array $children
     */
    public function __construct(private array $children)
    {}

    /**
     * @return array<Element|Component>
     */
    public function children(): array
    {
        return $this->children;
    }
}
