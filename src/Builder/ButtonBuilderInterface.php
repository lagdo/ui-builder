<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Element\ButtonGroupInterface;
use Lagdo\UiBuilder\Element\ButtonInterface;

interface ButtonBuilderInterface
{
    /**
     * @return ButtonGroupInterface
     */
    public function buttonGroup(...$arguments): ButtonGroupInterface;

    /**
     * @return ButtonInterface
     */
    public function button(...$arguments): ButtonInterface;
}
