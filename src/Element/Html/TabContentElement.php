<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\TabContentInterface;

class TabContentElement extends Element implements TabContentInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
