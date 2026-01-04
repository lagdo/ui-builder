<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

trait PaginationBuilderTrait
{
    /**
     * @var string
     */
    protected string $paginationComponentClass = '';

    /**
     * @var string
     */
    protected string $paginationItemComponentClass = '';

    /**
     * @inheritDoc
     */
    public function pagination(...$arguments): Base\PaginationComponent
    {
        return $this->createComponentOfClass($this->paginationComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function paginationItem(...$arguments): Base\PaginationItemComponent
    {
        return $this->createComponentOfClass($this->paginationItemComponentClass, $arguments);
    }
}
