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
     * @var string
     */
    protected string $tableHeadComponentClass = '';

    /**
     * @var string
     */
    protected string $tableBodyComponentClass = '';

    /**
     * @var string
     */
    protected string $tableFootComponentClass = '';

    /**
     * @var string
     */
    protected string $tableRowComponentClass = '';

    /**
     * @var string
     */
    protected string $tableHeadCellComponentClass = '';

    /**
     * @var string
     */
    protected string $tableDataCellComponentClass = '';

    /**
     * @inheritDoc
     */
    public function table(...$arguments): Base\TableComponent
    {
        return $this->createComponentOfClass($this->tableComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableHead(...$arguments): Base\TableHeadComponent
    {
        return $this->createComponentOfClass($this->tableHeadComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableBody(...$arguments): Base\TableBodyComponent
    {
        return $this->createComponentOfClass($this->tableBodyComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableFoot(...$arguments): Base\TableFootComponent
    {
        return $this->createComponentOfClass($this->tableFootComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableRow(...$arguments): Base\TableRowComponent
    {
        return $this->createComponentOfClass($this->tableRowComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableHeadCell(...$arguments): Base\TableHeadCellComponent
    {
        return $this->createComponentOfClass($this->tableHeadCellComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableDataCell(...$arguments): Base\TableDataCellComponent
    {
        return $this->createComponentOfClass($this->tableDataCellComponentClass, $arguments);
    }
}
