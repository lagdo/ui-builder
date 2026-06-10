<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

interface PaginationBuilderInterface
{
    /**
     * @return Component\PaginationComponent
     */
    public function pagination(...$arguments): Component\PaginationComponent;

    /**
     * @return Component\PaginationItemComponent
     */
    public function paginationItem(...$arguments): Component\PaginationItemComponent;
}
