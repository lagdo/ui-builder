<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;
use Lagdo\UiBuilder\Component\MenuItemComponent;

trait MenuBuilderTrait
{
    /**
     * @var string
     */
    protected string $menuComponentClass = '';

    /**
     * @var string
     */
    protected string $menuItemComponentClass = '';

    /**
     * @var string
     */
    protected string $breadcrumbComponentClass = '';

    /**
     * @var string
     */
    protected string $breadcrumbItemComponentClass = '';

    /**
     * @inheritDoc
     */
    public function menu(...$arguments): Component\MenuComponent
    {
        return $this->createComponentOfClass($this->menuComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function menuItem(...$arguments): Component\MenuItemComponent
    {
        return $this->createComponentOfClass($this->menuItemComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function breadcrumb(...$arguments): Component\BreadcrumbComponent
    {
        return $this->createComponentOfClass($this->breadcrumbComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function breadcrumbItem(...$arguments): Component\BreadcrumbItemComponent
    {
        return $this->createComponentOfClass($this->breadcrumbItemComponentClass, $arguments);
    }
}
