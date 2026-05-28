<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TableDataCellComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'td';
}
