<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

trait TableBuilderTrait
{
    /**
     * @var string
     */
    protected string $tableComponentClass = '';

    /**
     * @inheritDoc
     */
    public function table(...$arguments): Base\TableComponent
    {
        return $this->createComponentOfClass($this->tableComponentClass, $arguments);
    }
}
