<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class AlertComponent extends HtmlComponent
{
    use Traits\LevelTrait;
    use Traits\VariantTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'div';
    }
}
