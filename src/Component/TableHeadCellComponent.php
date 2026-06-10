<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class TableHeadCellComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'th';
}
