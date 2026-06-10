<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class TableDataCellComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'td';
}
