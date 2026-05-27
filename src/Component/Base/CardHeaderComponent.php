<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class CardHeaderComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'div';
    }
}
