<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\PaginationComponent;
use Lagdo\UiBuilder\Component\Base\PaginationItemComponent;

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
