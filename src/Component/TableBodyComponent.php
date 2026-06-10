<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class TableBodyComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'tbody';
}
