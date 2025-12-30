<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\TableComponent;

trait TableBuilderTrait
{
    /**
     * @return string
     */
    abstract protected function _tableComponentClass(): string;

    /**
     * @inheritDoc
     */
    public function table(...$arguments): TableComponent
    {
        return $this->createComponentOfClass($this->_tableComponentClass(), $arguments);
    }
}
