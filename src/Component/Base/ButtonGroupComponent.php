<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class ButtonGroupComponent extends HtmlComponent
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
