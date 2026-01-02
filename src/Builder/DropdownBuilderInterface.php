<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\DropdownComponent;
use Lagdo\UiBuilder\Component\Base\DropdownItemComponent;
use Lagdo\UiBuilder\Component\Base\DropdownMenuComponent;
use Lagdo\UiBuilder\Component\Base\DropdownMenuItemComponent;

interface DropdownBuilderInterface
{
    /**
     * @return DropdownComponent
     */
    public function dropdown(...$arguments): DropdownComponent;

    /**
     * @param string $style
     *
     * @return DropdownItemComponent
     */
    public function dropdownItem(...$arguments): DropdownItemComponent;

    /**
     * @return DropdownMenuComponent
     */
    public function dropdownMenu(...$arguments): DropdownMenuComponent;

    /**
     * @return DropdownMenuItemComponent
     */
    public function dropdownMenuItem(...$arguments): DropdownMenuItemComponent;
}
