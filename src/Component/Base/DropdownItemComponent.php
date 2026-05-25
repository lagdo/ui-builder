<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class DropdownItemComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = 'button';

    /**
     * @param string $style
     *
     * @return static
     */
    public function skin(string $style): static
    {
        return $this;
    }
}
