<?php

namespace Lagdo\UiBuilder\Component\Virtual;

class ListComponent extends VirtualComponent
{
    /**
     * The constructor
     *
     * @param array $children
     */
    public function __construct(array $children)
    {
        $this->children = $children;
    }
}
