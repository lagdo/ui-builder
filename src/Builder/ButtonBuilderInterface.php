<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface ButtonBuilderInterface
{
    /**
     * @return Base\ButtonComponent
     */
    public function button(...$arguments): Base\ButtonComponent;

    /**
     * @return Base\ButtonGroupComponent
     */
    public function buttonGroup(...$arguments): Base\ButtonGroupComponent;
}
