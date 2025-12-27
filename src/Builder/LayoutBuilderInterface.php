<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\ColInterface;
use Lagdo\UiBuilder\Component\RowInterface;

interface LayoutBuilderInterface
{
    /**
     * @return RowInterface
     */
    public function row(...$arguments): RowInterface;

    /**
     * @return ColInterface
     */
    public function col(...$arguments): ColInterface;
}
