<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class LabelComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'label';
}
