<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TabContentItemComponent extends HtmlComponent
{
    use Traits\StateTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'div';
    }
}
