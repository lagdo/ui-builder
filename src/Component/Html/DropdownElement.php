<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\DropdownInterface;

class DropdownElement extends Element implements DropdownInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
