<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class DropdownButtonComponent extends HtmlComponent
{
    use Traits\VisualTrait;

    /**
     * @var string
     */
    protected string $tagName = 'button';
}
