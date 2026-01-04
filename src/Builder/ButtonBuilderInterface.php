<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface ButtonBuilderInterface
{
    /**
     * @return Base\ButtonGroupComponent
     */
    public function buttonGroup(...$arguments): Base\ButtonGroupComponent;

    /**
     * @return Base\ButtonComponent
     */
    public function button(...$arguments): Base\ButtonComponent;

    /**
     * @return Base\BadgeComponent
     */
    public function badge(...$arguments): Base\BadgeComponent;
}
