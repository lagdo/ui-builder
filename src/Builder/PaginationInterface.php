<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface PaginationInterface
{
    /**
     * @return BuilderInterface
     */
    public function pagination(...$arguments): BuilderInterface;

    /**
     * @param int $nPageNumber
     *
     * @return BuilderInterface
     */
    public function paginationItem(int $nPageNumber, ...$arguments): BuilderInterface;

    /**
     * @param int $nPageNumber
     *
     * @return BuilderInterface
     */
    public function paginationActiveItem(int $nPageNumber, ...$arguments): BuilderInterface;

    /**
     * @param int $nPageNumber
     *
     * @return BuilderInterface
     */
    public function paginationDisabledItem(int $nPageNumber, ...$arguments): BuilderInterface;
}
