<?php

namespace Lagdo\UiBuilder\Builder;

interface PaginationInterface
{
    /**
     * @return self
     */
    public function pagination(): self;

    /**
     * @return self
     */
    public function paginationItem(): self;

    /**
     * @return self
     */
    public function paginationActiveItem(): self;

    /**
     * @return self
     */
    public function paginationDisabledItem(): self;
}
