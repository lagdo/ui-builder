<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\PaginationInterface;

class PaginationElement extends Element implements PaginationInterface
{
    /**
     * @var string
     */
    public static string $tag = 'ul';
}
