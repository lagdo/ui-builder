<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Element\PaginationInterface;
use Lagdo\UiBuilder\Element\PaginationItemInterface;

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
