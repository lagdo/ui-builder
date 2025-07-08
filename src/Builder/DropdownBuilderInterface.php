<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Element\DropdownInterface;
use Lagdo\UiBuilder\Element\DropdownItemInterface;
use Lagdo\UiBuilder\Element\DropdownMenuInterface;
use Lagdo\UiBuilder\Element\DropdownMenuItemInterface;

interface DropdownBuilderInterface
{
    /**
     * @return DropdownInterface
     */
    public function dropdown(...$arguments): DropdownInterface;

    /**
     * @param string $style
     *
     * @return DropdownItemInterface
     */
    public function dropdownItem(...$arguments): DropdownItemInterface;

    /**
     * @return DropdownMenuInterface
     */
    public function dropdownMenu(...$arguments): DropdownMenuInterface;

    /**
     * @return DropdownMenuItemInterface
     */
    public function dropdownMenuItem(...$arguments): DropdownMenuItemInterface;
}
