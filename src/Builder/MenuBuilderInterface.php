<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Element\BreadcrumbInterface;
use Lagdo\UiBuilder\Element\BreadcrumbItemInterface;
use Lagdo\UiBuilder\Element\MenuInterface;
use Lagdo\UiBuilder\Element\MenuItemInterface;

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
