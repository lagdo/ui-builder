<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class BadgeComponent extends UiComponent
{
    use Traits\VisualTrait;
    use Traits\VariantTrait;

    /**
     * @var string
     */
    protected string $tagName = 'span';

    /**
     * @return static
     */
    public function top(): static
    {
        return $this;
    }
}
