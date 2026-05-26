<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface TableBuilderInterface
{
    /**
     * @return Base\TableComponent
     */
    public function table(...$arguments): Base\TableComponent;

    /**
     * @return Base\TableHeadComponent
     */
    public function tableHead(...$arguments): Base\TableHeadComponent;

    /**
     * @return Base\TableBodyComponent
     */
    public function tableBody(...$arguments): Base\TableBodyComponent;

    /**
     * @return Base\TableFootComponent
     */
    public function tableFoot(...$arguments): Base\TableFootComponent;

    /**
     * @return Base\TableRowComponent
     */
    public function tableRow(...$arguments): Base\TableRowComponent;

    /**
     * @return Base\TableDataComponent
     */
    public function tableData(...$arguments): Base\TableDataComponent;
}
