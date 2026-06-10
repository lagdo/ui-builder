<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class PaginationComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'ul';
}
