<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\DropdownComponent;
use Lagdo\UiBuilder\Component\DropdownItemComponent;
use Lagdo\UiBuilder\Component\DropdownMenuComponent;
use Lagdo\UiBuilder\Component\DropdownMenuItemComponent;

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
        return $this->createElementOfClass($this->_dropdownComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownItem(...$arguments): DropdownItemComponent
    {
        return $this->createElementOfClass($this->_dropdownItemComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownMenu(...$arguments): DropdownMenuComponent
    {
        return $this->createElementOfClass($this->_dropdownMenuComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function dropdownMenuItem(...$arguments): DropdownMenuItemComponent
    {
        return $this->createElementOfClass($this->_dropdownMenuItemComponentClass(), $arguments);
    }
}
