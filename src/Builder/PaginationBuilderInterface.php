<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\PaginationInterface;
use Lagdo\UiBuilder\Component\PaginationItemInterface;

interface PaginationBuilderInterface
{
    /**
     * @return PaginationInterface
     */
    public function pagination(...$arguments): PaginationInterface;

    /**
     * @return PaginationItemInterface
     */
    public function paginationItem(...$arguments): PaginationItemInterface;
}
