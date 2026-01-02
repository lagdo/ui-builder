<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\TableComponent;

interface TableBuilderInterface
{
    /**
     * @return TableComponent
     */
    public function table(...$arguments): TableComponent;
}
