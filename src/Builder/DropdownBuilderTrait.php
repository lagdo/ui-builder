<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\DropdownComponent;
use Lagdo\UiBuilder\Component\Base\DropdownItemComponent;
use Lagdo\UiBuilder\Component\Base\DropdownMenuComponent;
use Lagdo\UiBuilder\Component\Base\DropdownMenuItemComponent;

trait DropdownBuilderTrait
{
    /**
     * @return string
     */
    abstract protected function _dropdownComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _dropdownItemComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _dropdownMenuComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _dropdownMenuItemComponentClass(): string;

    /**
     * @inheritDoc
     */
    public function dropdown(...$arguments): DropdownComponent
    {
        return $this->createComponentOfClass($this->_dropdownComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownItem(...$arguments): DropdownItemComponent
    {
        return $this->createComponentOfClass($this->_dropdownItemComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownMenu(...$arguments): DropdownMenuComponent
    {
        return $this->createComponentOfClass($this->_dropdownMenuComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownMenuItem(...$arguments): DropdownMenuItemComponent
    {
        return $this->createComponentOfClass($this->_dropdownMenuItemComponentClass(), $arguments);
    }
}
