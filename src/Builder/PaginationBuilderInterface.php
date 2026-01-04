<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface PaginationBuilderInterface
{
    /**
     * @return Base\PaginationComponent
     */
    public function pagination(...$arguments): Base\PaginationComponent;

    /**
     * @return Base\PaginationItemComponent
     */
    public function paginationItem(...$arguments): Base\PaginationItemComponent;
}
