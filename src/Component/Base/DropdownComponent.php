<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class DropdownComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'div';
}
