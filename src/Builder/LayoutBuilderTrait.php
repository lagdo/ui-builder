<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

trait LayoutBuilderTrait
{
    /**
     * @var string
     */
    protected string $GridRowComponentClass = '';

    /**
     * @var string
     */
    protected string $colComponentClass = '';

    /**
     * @inheritDoc
     */
    public function row(...$arguments): Base\GridRowComponent
    {
        return $this->createComponentOfClass($this->rowComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function col(...$arguments): Base\GridColComponent
    {
        return $this->createComponentOfClass($this->colComponentClass, $arguments);
    }
}
