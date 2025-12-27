<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\PaginationComponent;
use Lagdo\UiBuilder\Component\PaginationItemComponent;

interface PaginationBuilderInterface
{
    /**
     * @return PaginationComponent
     */
    public function pagination(...$arguments): PaginationComponent;

    /**
     * @return PaginationItemComponent
     */
    public function paginationItem(...$arguments): PaginationItemComponent;
}
