<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\DropdownComponent;
use Lagdo\UiBuilder\Component\Base\DropdownItemComponent;
use Lagdo\UiBuilder\Component\Base\DropdownMenuComponent;
use Lagdo\UiBuilder\Component\Base\DropdownMenuItemComponent;

trait DropdownBuilderTrait
{
    /**
     * @var string
     */
    protected string $dropdownComponentClass = '';

    /**
     * @var string
     */
    protected string $dropdownItemComponentClass = '';

    /**
     * @var string
     */
    protected string $dropdownMenuComponentClass = '';

    /**
     * @var string
     */
    protected string $dropdownMenuItemComponentClass = '';

    /**
     * @inheritDoc
     */
    public function dropdown(...$arguments): DropdownComponent
    {
        return $this->createComponentOfClass($this->dropdownComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownItem(...$arguments): DropdownItemComponent
    {
        return $this->createComponentOfClass($this->dropdownItemComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownMenu(...$arguments): DropdownMenuComponent
    {
        return $this->createComponentOfClass($this->dropdownMenuComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownMenuItem(...$arguments): DropdownMenuItemComponent
    {
        return $this->createComponentOfClass($this->dropdownMenuItemComponentClass, $arguments);
    }
}
