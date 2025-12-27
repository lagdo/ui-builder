<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\DropdownInterface;

class DropdownComponent extends HtmlComponent implements DropdownInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
