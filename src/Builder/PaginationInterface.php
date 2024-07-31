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
     * @return BuilderInterface
     */
    public function paginationItem(...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function paginationActiveItem(...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function paginationDisabledItem(...$arguments): BuilderInterface;
}
