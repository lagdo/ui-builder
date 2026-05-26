<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class DropdownComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'div';
    }
}
