<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class MenuItemComponent extends HtmlComponent
{
    use Traits\StateTrait;

    /**
     * @var string
     */
    protected string $tagName = 'li';
}
