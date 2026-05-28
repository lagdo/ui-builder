<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class ButtonGroupComponent extends HtmlComponent
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
