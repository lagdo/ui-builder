<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class TabContentItemComponent extends UiComponent
{
    use Traits\StateTrait;

    /**
     * @var string
     */
    protected string $tagName = 'div';
}
