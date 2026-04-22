<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface LayoutBuilderInterface
{
    /**
     * @return Base\GridRowComponent
     */
    public function row(...$arguments): Base\GridRowComponent;

    /**
     * @return Base\GridColComponent
     */
    public function col(...$arguments): Base\GridColComponent;
}
