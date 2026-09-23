<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class PaginationComponent extends UiComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'ul';
}
