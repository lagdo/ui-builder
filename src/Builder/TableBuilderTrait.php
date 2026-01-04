<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\TableComponent;

trait TableBuilderTrait
{
    /**
     * @var string
     */
    protected string $tableComponentClass = '';

    /**
     * @inheritDoc
     */
    public function table(...$arguments): TableComponent
    {
        return $this->createComponentOfClass($this->tableComponentClass, $arguments);
    }
}
