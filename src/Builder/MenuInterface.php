<?php

namespace Lagdo\UiBuilder\Builder;

interface MenuInterface
{
    /**
     * @return self
     */
    public function menu(...$arguments): self;

    /**
     * @return self
     */
    public function menuItem(...$arguments): self;

    /**
     * @return self
     */
    public function menuActiveItem(...$arguments): self;

    /**
     * @return self
     */
    public function menuDisabledItem(...$arguments): self;

    /**
     * @return self
     */
    public function breadcrumb(...$arguments): self;

    /**
     * @param bool $active
     *
     * @return self
     */
    public function breadcrumbItem(bool $active, ...$arguments): self;
}
