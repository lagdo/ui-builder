<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\PaginationComponent;
use Lagdo\UiBuilder\Component\Base\PaginationItemComponent;

trait PaginationBuilderTrait
{
    /**
     * @return string
     */
    abstract protected function _paginationComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _paginationItemComponentClass(): string;

    /**
     * @inheritDoc
     */
    public function pagination(...$arguments): PaginationComponent
    {
        return $this->createComponentOfClass($this->_paginationComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function paginationItem(...$arguments): PaginationItemComponent
    {
        return $this->createComponentOfClass($this->_paginationItemComponentClass(), $arguments);
    }
}
