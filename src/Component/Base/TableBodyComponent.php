<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TableBodyComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'tbody';
}
