<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\ButtonGroupInterface;

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
