<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\BreadcrumbComponent;
use Lagdo\UiBuilder\Component\Base\BreadcrumbItemComponent;
use Lagdo\UiBuilder\Component\Base\MenuComponent;
use Lagdo\UiBuilder\Component\Base\MenuItemComponent;

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
    public function menu(...$arguments): MenuComponent
    {
        return $this->createComponentOfClass($this->menuComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function menuItem(...$arguments): MenuItemComponent
    {
        return $this->createComponentOfClass($this->menuItemComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function breadcrumb(...$arguments): BreadcrumbComponent
    {
        return $this->createComponentOfClass($this->breadcrumbComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function breadcrumbItem(...$arguments): BreadcrumbItemComponent
    {
        return $this->createComponentOfClass($this->breadcrumbItemComponentClass, $arguments);
    }
}
