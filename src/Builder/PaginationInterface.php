<?php

namespace Lagdo\UiBuilder\Builder;

interface PaginationInterface
{
    /**
     * @return self
     */
    public function pagination(...$arguments): self;

    /**
     * @return self
     */
    public function paginationItem(...$arguments): self;

    /**
     * @return self
     */
    public function paginationActiveItem(...$arguments): self;

    /**
     * @return self
     */
    public function paginationDisabledItem(...$arguments): self;
}
