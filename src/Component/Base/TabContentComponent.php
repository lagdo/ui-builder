<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TabContentComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'div';
}
