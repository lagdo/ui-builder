<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

interface ButtonBuilderInterface
{
    /**
     * @return Component\ButtonComponent
     */
    public function button(...$arguments): Component\ButtonComponent;

    /**
     * @return Component\ButtonGroupComponent
     */
    public function buttonGroup(...$arguments): Component\ButtonGroupComponent;
}
