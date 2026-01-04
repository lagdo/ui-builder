<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

trait LayoutBuilderTrait
{
    /**
     * @var string
     */
    protected string $rowComponentClass = '';

    /**
     * @var string
     */
    protected string $colComponentClass = '';

    /**
     * @inheritDoc
     */
    public function row(...$arguments): Base\RowComponent
    {
        return $this->createComponentOfClass($this->rowComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function col(...$arguments): Base\ColComponent
    {
        return $this->createComponentOfClass($this->colComponentClass, $arguments);
    }
}
