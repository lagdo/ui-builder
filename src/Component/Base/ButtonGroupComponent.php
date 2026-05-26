<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class ButtonGroupComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'div';
    }

    /**
     * @return static
     */
    public function fullWidth(): static
    {
        return $this;
    }
}
