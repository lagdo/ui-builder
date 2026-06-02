<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Lagdo\UiBuilder\Component\Component;
use Lagdo\UiBuilder\Component\Html\Element;
use Closure;

use function array_keys;
use function array_map;

class EachComponent extends VirtualComponent
{
    /**
     * @param array $items
     * @param Closure $closure
     */
    public function __construct(private array $items, private Closure $closure)
    {}

    /**
     * @return array<Element|Component>
     */
    public function children(): array
    {
        return array_map($this->closure, $this->items, array_keys($this->items));
    }
}
