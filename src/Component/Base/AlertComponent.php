<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class AlertComponent extends HtmlComponent
{
    use Traits\LevelTrait;
    use Traits\VariantTrait;

    /**
     * @var string
     */
    protected string $tagName = 'div';
}
