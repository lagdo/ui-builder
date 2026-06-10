<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

interface DropdownBuilderInterface
{
    /**
     * @return Component\DropdownComponent
     */
    public function dropdown(...$arguments): Component\DropdownComponent;

    /**
     * @return Component\DropdownButtonComponent
     */
    public function dropdownButton(...$arguments): Component\DropdownButtonComponent;

    /**
     * @return Component\DropdownMenuComponent
     */
    public function dropdownMenu(...$arguments): Component\DropdownMenuComponent;

    /**
     * @return Component\DropdownMenuItemComponent
     */
    public function dropdownMenuItem(...$arguments): Component\DropdownMenuItemComponent;
}
