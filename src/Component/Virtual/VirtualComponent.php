<?php

namespace Lagdo\UiBuilder\Component\Virtual;

use Lagdo\UiBuilder\Component\Base\Component;

/**
 * Base class for virtual components.
 */
abstract class VirtualComponent extends Component
{
    /**
     * @var array
     */
    public array $children = [];
}
