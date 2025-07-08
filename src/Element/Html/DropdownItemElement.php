<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\DropdownItemInterface;

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
