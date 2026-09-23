<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class AlertComponent extends UiComponent
{
    use Traits\LevelTrait;
    use Traits\VariantTrait;

    /**
     * @var string
     */
    protected string $tagName = 'div';
}
