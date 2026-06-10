<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class AlertComponent extends HtmlComponent
{
    use Traits\LevelTrait;
    use Traits\VariantTrait;

    /**
     * @var string
     */
    protected string $tagName = 'div';
}
