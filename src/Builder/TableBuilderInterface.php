<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Element\TableInterface;

interface TableBuilderInterface
{
    /**
     * @return TableInterface
     */
    public function table(...$arguments): TableInterface;
}
