<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\DropdownItemInterface;

class DropdownItemComponent extends HtmlComponent implements DropdownItemInterface
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
    public function style(string $style): static
    {
        return $this;
    }
}
