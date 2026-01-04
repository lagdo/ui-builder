<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface TableBuilderInterface
{
    /**
     * @return Base\TableComponent
     */
    public function table(...$arguments): Base\TableComponent;
}
