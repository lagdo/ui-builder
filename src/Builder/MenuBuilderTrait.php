<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\BreadcrumbComponent;
use Lagdo\UiBuilder\Component\BreadcrumbItemComponent;
use Lagdo\UiBuilder\Component\MenuComponent;
use Lagdo\UiBuilder\Component\MenuItemComponent;

trait MenuBuilderTrait
{
    /**
     * @return string
     */
    abstract protected function _menuComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _menuItemComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _breadcrumbComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _breadcrumbItemComponentClass(): string;

    /**
     * @inheritDoc
     */
    public function menu(...$arguments): MenuComponent
    {
        return $this->createElementOfClass($this->_menuComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function menuItem(...$arguments): MenuItemComponent
    {
        return $this->createElementOfClass($this->_menuItemComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function breadcrumb(...$arguments): BreadcrumbComponent
    {
        return $this->createElementOfClass($this->_breadcrumbComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function breadcrumbItem(...$arguments): BreadcrumbItemComponent
    {
        return $this->createElementOfClass($this->_breadcrumbItemComponentClass(), $arguments);
    }
}
