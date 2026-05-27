<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class MenuComponent extends HtmlComponent
{
    use Traits\DirectionTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'ul';
    }
}
