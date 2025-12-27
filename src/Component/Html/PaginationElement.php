<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\PaginationInterface;

class PaginationElement extends Element implements PaginationInterface
{
    /**
     * @var string
     */
    public static string $tag = 'ul';
}
