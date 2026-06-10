<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class CardComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'div';
}
