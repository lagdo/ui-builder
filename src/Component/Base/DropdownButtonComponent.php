<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class DropdownButtonComponent extends HtmlComponent
{
    use Traits\VisualTrait;

    /**
     * @var string
     */
    protected string $tagName = 'button';
}
