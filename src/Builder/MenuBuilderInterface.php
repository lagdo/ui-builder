<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

interface MenuBuilderInterface
{
    /**
     * @return Component\MenuComponent
     */
    public function menu(...$arguments): Component\MenuComponent;

    /**
     * @return Component\MenuItemComponent
     */
    public function menuItem(...$arguments): Component\MenuItemComponent;

    /**
     * @return Component\BreadcrumbComponent
     */
    public function breadcrumb(...$arguments): Component\BreadcrumbComponent;

    /**
     * @return Component\BreadcrumbItemComponent
     */
    public function breadcrumbItem(...$arguments): Component\BreadcrumbItemComponent;
}
