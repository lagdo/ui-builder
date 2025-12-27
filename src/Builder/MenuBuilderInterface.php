<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\BreadcrumbInterface;
use Lagdo\UiBuilder\Component\BreadcrumbItemInterface;
use Lagdo\UiBuilder\Component\MenuInterface;
use Lagdo\UiBuilder\Component\MenuItemInterface;

interface MenuBuilderInterface
{
    /**
     * @return MenuInterface
     */
    public function menu(...$arguments): MenuInterface;

    /**
     * @return MenuItemInterface
     */
    public function menuItem(...$arguments): MenuItemInterface;

    /**
     * @return BreadcrumbInterface
     */
    public function breadcrumb(...$arguments): BreadcrumbInterface;

    /**
     * @return BreadcrumbItemInterface
     */
    public function breadcrumbItem(...$arguments): BreadcrumbItemInterface;
}
