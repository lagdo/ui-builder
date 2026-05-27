<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

trait DropdownBuilderTrait
{
    /**
     * @var string
     */
    protected string $dropdownComponentClass = '';

    /**
     * @var string
     */
    protected string $dropdownButtonComponentClass = '';

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
    public function dropdown(...$arguments): Base\DropdownComponent
    {
        return $this->createComponentOfClass($this->dropdownComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownButton(...$arguments): Base\DropdownButtonComponent
    {
        return $this->createComponentOfClass($this->dropdownButtonComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownMenu(...$arguments): Base\DropdownMenuComponent
    {
        return $this->createComponentOfClass($this->dropdownMenuComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownMenuItem(...$arguments): Base\DropdownMenuItemComponent
    {
        return $this->createComponentOfClass($this->dropdownMenuItemComponentClass, $arguments);
    }
}
