<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\TableInterface;

interface TableBuilderInterface
{
    /**
     * @return TableInterface
     */
    public function table(...$arguments): TableInterface;
}
