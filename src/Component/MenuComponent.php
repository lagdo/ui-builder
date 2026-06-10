<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class MenuComponent extends HtmlComponent
{
    use Traits\DirectionTrait;

    /**
     * @var string
     */
    protected string $tagName = 'ul';
}
