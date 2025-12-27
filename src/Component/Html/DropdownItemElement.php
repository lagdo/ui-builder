<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\DropdownItemInterface;

class DropdownItemElement extends Element implements DropdownItemInterface
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
