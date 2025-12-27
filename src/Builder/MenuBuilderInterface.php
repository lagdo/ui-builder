<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\BreadcrumbComponent;
use Lagdo\UiBuilder\Component\BreadcrumbItemComponent;
use Lagdo\UiBuilder\Component\MenuComponent;
use Lagdo\UiBuilder\Component\MenuItemComponent;

interface MenuBuilderInterface
{
    /**
     * @return MenuComponent
     */
    public function menu(...$arguments): MenuComponent;

    /**
     * @return MenuItemComponent
     */
    public function menuItem(...$arguments): MenuItemComponent;

    /**
     * @return BreadcrumbComponent
     */
    public function breadcrumb(...$arguments): BreadcrumbComponent;

    /**
     * @return BreadcrumbItemComponent
     */
    public function breadcrumbItem(...$arguments): BreadcrumbItemComponent;
}
