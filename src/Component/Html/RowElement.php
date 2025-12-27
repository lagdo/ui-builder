<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\RowInterface;

class RowElement extends Element implements RowInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
