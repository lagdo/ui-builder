<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\ColComponent;
use Lagdo\UiBuilder\Component\RowComponent;

trait LayoutBuilderTrait
{
    /**
     * @return string
     */
    abstract protected function _rowComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _colComponentClass(): string;

    /**
     * @inheritDoc
     */
    public function row(...$arguments): RowComponent
    {
        return $this->createElementOfClass($this->_rowComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function col(...$arguments): ColComponent
    {
        return $this->createElementOfClass($this->_colComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function formRow(...$arguments): RowComponent
    {
        return $this->row(...$arguments);
    }

    /**
     * @inheritDoc
     */
    public function formCol(...$arguments): ColComponent
    {
        return $this->col(...$arguments);
    }
}
