<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface MenuBuilderInterface
{
    /**
     * @return Base\MenuComponent
     */
    public function menu(...$arguments): Base\MenuComponent;

    /**
     * @return Base\MenuItemComponent
     */
    public function menuItem(...$arguments): Base\MenuItemComponent;

    /**
     * @return Base\BreadcrumbComponent
     */
    public function breadcrumb(...$arguments): Base\BreadcrumbComponent;

    /**
     * @return Base\BreadcrumbItemComponent
     */
    public function breadcrumbItem(...$arguments): Base\BreadcrumbItemComponent;
}
