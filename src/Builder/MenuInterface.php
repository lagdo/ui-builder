<?php

namespace Lagdo\UiBuilder\Builder;

interface MenuInterface
{
    /**
     * @return self
     */
    public function menu(): self;

    /**
     * @return self
     */
    public function menuItem(): self;

    /**
     * @return self
     */
    public function menuActiveItem(): self;

    /**
     * @return self
     */
    public function menuDisabledItem(): self;

    /**
     * @return self
     */
    public function breadcrumb(): self;

    /**
     * @param bool $active
     *
     * @return self
     */
    public function breadcrumbItem(bool $active): self;
}
