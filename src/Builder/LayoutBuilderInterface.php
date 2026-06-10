<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

interface LayoutBuilderInterface
{
    /**
     * @return Component\GridRowComponent
     */
    public function row(...$arguments): Component\GridRowComponent;

    /**
     * @return Component\GridColComponent
     */
    public function col(...$arguments): Component\GridColComponent;

    /**
     * @return Component\AlertComponent
     */
    public function alert(...$arguments): Component\AlertComponent;

    /**
     * @return Component\BadgeComponent
     */
    public function badge(...$arguments): Component\BadgeComponent;
}
