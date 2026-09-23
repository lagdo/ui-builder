<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

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
    public function pagination(...$arguments): Component\PaginationComponent
    {
        return $this->createComponent($this->paginationComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function paginationItem(...$arguments): Component\PaginationItemComponent
    {
        return $this->createComponent($this->paginationItemComponentClass, $arguments);
    }
}
