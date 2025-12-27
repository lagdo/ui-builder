<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\RowInterface;

class RowComponent extends HtmlComponent implements RowInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
