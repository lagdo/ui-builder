<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class DropdownButtonComponent extends HtmlComponent
{
    use Traits\VisualTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'button';
    }
}
