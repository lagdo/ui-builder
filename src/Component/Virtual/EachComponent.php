<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Closure;

class EachComponent extends VirtualComponent
{
    /**
     * The constructor
     *
     * @param array $items
     * @param Closure $closure
     */
    public function __construct(array $values, Closure $closure)
    {
        foreach ($values as $key => $value) {
            $this->children[] = $closure($value, $key);
        }
    }
}
