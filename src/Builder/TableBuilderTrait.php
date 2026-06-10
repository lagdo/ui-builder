<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

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
    public function table(...$arguments): Component\TableComponent
    {
        return $this->createComponentOfClass($this->tableComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableHead(...$arguments): Component\TableHeadComponent
    {
        return $this->createComponentOfClass($this->tableHeadComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableBody(...$arguments): Component\TableBodyComponent
    {
        return $this->createComponentOfClass($this->tableBodyComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableFoot(...$arguments): Component\TableFootComponent
    {
        return $this->createComponentOfClass($this->tableFootComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableRow(...$arguments): Component\TableRowComponent
    {
        return $this->createComponentOfClass($this->tableRowComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableHeadCell(...$arguments): Component\TableHeadCellComponent
    {
        return $this->createComponentOfClass($this->tableHeadCellComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tableDataCell(...$arguments): Component\TableDataCellComponent
    {
        return $this->createComponentOfClass($this->tableDataCellComponentClass, $arguments);
    }
}
