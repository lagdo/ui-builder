<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\DropdownMenuItemInterface;

class DropdownMenuItemElement extends Element implements DropdownMenuItemInterface
{
    /**
     * @var string
     */
    public static string $tag = '';
}
