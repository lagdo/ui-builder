<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\BadgeComponent;
use Lagdo\UiBuilder\Component\ButtonGroupComponent;
use Lagdo\UiBuilder\Component\ButtonComponent;

interface ButtonBuilderInterface
{
    /**
     * @return ButtonGroupComponent
     */
    public function buttonGroup(...$arguments): ButtonGroupComponent;

    /**
     * @return ButtonComponent
     */
    public function button(...$arguments): ButtonComponent;

    /**
     * @return BadgeComponent
     */
    public function badge(...$arguments): BadgeComponent;
}
