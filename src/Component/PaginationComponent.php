<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\PaginationInterface;

class PaginationComponent extends HtmlComponent implements PaginationInterface
{
    /**
     * @var string
     */
    public static string $tag = 'ul';
}
