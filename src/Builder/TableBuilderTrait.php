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
    protected string $tableDataComponentClass = '';

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
    public function tableData(...$arguments): Base\TableDataComponent
    {
        return $this->createComponentOfClass($this->tableDataComponentClass, $arguments);
    }
}
