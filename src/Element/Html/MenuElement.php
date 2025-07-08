<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\MenuInterface;

class MenuElement extends Element implements MenuInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
