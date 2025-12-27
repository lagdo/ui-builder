<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\MenuInterface;

class MenuComponent extends HtmlComponent implements MenuInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
