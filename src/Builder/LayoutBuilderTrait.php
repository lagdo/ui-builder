<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\ColComponent;
use Lagdo\UiBuilder\Component\Base\RowComponent;

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
    public function row(...$arguments): RowComponent
    {
        return $this->createComponentOfClass($this->rowComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function col(...$arguments): ColComponent
    {
        return $this->createComponentOfClass($this->colComponentClass, $arguments);
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
