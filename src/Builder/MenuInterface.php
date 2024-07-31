<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface MenuInterface
{
    /**
     * @return BuilderInterface
     */
    public function menu(...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function menuItem(...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function menuActiveItem(...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function menuDisabledItem(...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function breadcrumb(...$arguments): BuilderInterface;

    /**
     * @param bool $active
     *
     * @return BuilderInterface
     */
    public function breadcrumbItem(bool $active, ...$arguments): BuilderInterface;
}
