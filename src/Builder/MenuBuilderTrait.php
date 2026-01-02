<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\BreadcrumbComponent;
use Lagdo\UiBuilder\Component\Base\BreadcrumbItemComponent;
use Lagdo\UiBuilder\Component\Base\MenuComponent;
use Lagdo\UiBuilder\Component\Base\MenuItemComponent;

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
        return $this->createComponentOfClass($this->_menuComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function menuItem(...$arguments): MenuItemComponent
    {
        return $this->createComponentOfClass($this->_menuItemComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function breadcrumb(...$arguments): BreadcrumbComponent
    {
        return $this->createComponentOfClass($this->_breadcrumbComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function breadcrumbItem(...$arguments): BreadcrumbItemComponent
    {
        return $this->createComponentOfClass($this->_breadcrumbItemComponentClass(), $arguments);
    }
}
