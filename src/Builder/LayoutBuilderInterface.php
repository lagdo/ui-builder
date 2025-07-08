<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Element\ColInterface;
use Lagdo\UiBuilder\Element\RowInterface;

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
