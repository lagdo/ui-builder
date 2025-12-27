<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\MenuInterface;

class MenuElement extends Element implements MenuInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
