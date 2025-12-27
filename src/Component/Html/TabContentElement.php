<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\TabContentInterface;

class TabContentElement extends Element implements TabContentInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
