<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\PaginationComponent;
use Lagdo\UiBuilder\Component\Base\PaginationItemComponent;

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
    public function pagination(...$arguments): PaginationComponent
    {
        return $this->createComponentOfClass($this->paginationComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function paginationItem(...$arguments): PaginationItemComponent
    {
        return $this->createComponentOfClass($this->paginationItemComponentClass, $arguments);
    }
}
