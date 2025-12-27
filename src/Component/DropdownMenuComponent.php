<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\DropdownMenuInterface;

class DropdownMenuComponent extends HtmlComponent implements DropdownMenuInterface
{
    /**
     * @var string
     */
    public static string $tag = '';
}
