<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

interface TableBuilderInterface
{
    /**
     * @return Component\TableComponent
     */
    public function table(...$arguments): Component\TableComponent;

    /**
     * @return Component\TableHeadComponent
     */
    public function tableHead(...$arguments): Component\TableHeadComponent;

    /**
     * @return Component\TableBodyComponent
     */
    public function tableBody(...$arguments): Component\TableBodyComponent;

    /**
     * @return Component\TableFootComponent
     */
    public function tableFoot(...$arguments): Component\TableFootComponent;

    /**
     * @return Component\TableRowComponent
     */
    public function tableRow(...$arguments): Component\TableRowComponent;

    /**
     * @return Component\TableHeadCellComponent
     */
    public function tableHeadCell(...$arguments): Component\TableHeadCellComponent;

    /**
     * @return Component\TableDataCellComponent
     */
    public function tableDataCell(...$arguments): Component\TableDataCellComponent;
}
