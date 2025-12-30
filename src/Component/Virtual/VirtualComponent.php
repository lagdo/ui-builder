<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Lagdo\UiBuilder\Component\Base\Component;
use Lagdo\UiBuilder\Component\Html\Element;

/**
 * Base class for virtual components.
 */
abstract class VirtualComponent extends Component
{
    /**
     * @var array
     */
    protected array $children = [];

    /**
     * @return array<Element|Component>
     */
    public function children(): array
    {
        return $this->children;
    }
}
