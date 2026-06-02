<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Lagdo\UiBuilder\Component\Component;
use Lagdo\UiBuilder\Component\Html\Element;

/**
 * Base class for virtual components.
 */
abstract class VirtualComponent extends Component
{
    /**
     * @return array<Element|Component>
     */
    abstract public function children(): array;
}
