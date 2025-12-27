<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\DropdownInterface;
use Lagdo\UiBuilder\Component\DropdownItemInterface;
use Lagdo\UiBuilder\Component\DropdownMenuInterface;
use Lagdo\UiBuilder\Component\DropdownMenuItemInterface;

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
