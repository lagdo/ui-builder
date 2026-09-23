<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class ButtonGroupComponent extends UiComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'div';

    /**
     * @return static
     */
    public function fullWidth(): static
    {
        return $this;
    }
}
