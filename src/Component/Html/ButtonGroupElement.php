<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\ButtonGroupInterface;

class ButtonGroupElement extends Element implements ButtonGroupInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';

    /**
     * @return static
     */
    public function fullWidth(): static
    {
        return $this;
    }
}
