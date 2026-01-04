<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface DropdownBuilderInterface
{
    /**
     * @return Base\DropdownComponent
     */
    public function dropdown(...$arguments): Base\DropdownComponent;

    /**
     * @param string $style
     *
     * @return Base\DropdownItemComponent
     */
    public function dropdownItem(...$arguments): Base\DropdownItemComponent;

    /**
     * @return Base\DropdownMenuComponent
     */
    public function dropdownMenu(...$arguments): Base\DropdownMenuComponent;

    /**
     * @return Base\DropdownMenuItemComponent
     */
    public function dropdownMenuItem(...$arguments): Base\DropdownMenuItemComponent;
}
