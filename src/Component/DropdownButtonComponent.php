<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class DropdownButtonComponent extends UiComponent
{
    use Traits\VisualTrait;

    /**
     * @var string
     */
    protected string $tagName = 'button';
}
