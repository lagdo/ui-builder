<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TableFootComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'tfoot';
}
