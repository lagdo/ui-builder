<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\RowInterface;

class RowElement extends Element implements RowInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
