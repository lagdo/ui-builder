<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\BadgeComponent;
use Lagdo\UiBuilder\Component\Base\ButtonGroupComponent;
use Lagdo\UiBuilder\Component\Base\ButtonComponent;

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
