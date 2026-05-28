<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class PaginationComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'ul';
}
