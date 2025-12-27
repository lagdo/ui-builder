<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\DropdownMenuItemInterface;

class DropdownMenuItemComponent extends HtmlComponent implements DropdownMenuItemInterface
{
    /**
     * @var string
     */
    public static string $tag = '';
}
