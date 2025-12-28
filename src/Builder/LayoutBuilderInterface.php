<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\ColComponent;
use Lagdo\UiBuilder\Component\RowComponent;

interface LayoutBuilderInterface
{
    /**
     * @return RowComponent
     */
    public function row(...$arguments): RowComponent;

    /**
     * @return ColComponent
     */
    public function col(...$arguments): ColComponent;

    /**
     * @return RowComponent
     */
    public function formRow(...$arguments): RowComponent;

    /**
     * @return ColComponent
     */
    public function formCol(...$arguments): ColComponent;
}
