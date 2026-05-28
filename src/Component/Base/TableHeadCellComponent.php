<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TableHeadCellComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'th';
}
