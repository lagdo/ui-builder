<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface LayoutBuilderInterface
{
    /**
     * @return Base\RowComponent
     */
    public function row(...$arguments): Base\RowComponent;

    /**
     * @return Base\ColComponent
     */
    public function col(...$arguments): Base\ColComponent;
}
