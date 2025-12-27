<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\TabContentInterface;

class TabContentComponent extends HtmlComponent implements TabContentInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
