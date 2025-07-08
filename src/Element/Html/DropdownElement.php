<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\DropdownInterface;

class DropdownElement extends Element implements DropdownInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
