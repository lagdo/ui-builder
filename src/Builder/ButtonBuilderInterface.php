<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\BadgeInterface;
use Lagdo\UiBuilder\Component\ButtonGroupInterface;
use Lagdo\UiBuilder\Component\ButtonInterface;

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

    /**
     * @return BadgeInterface
     */
    public function badge(...$arguments): BadgeInterface;
}
