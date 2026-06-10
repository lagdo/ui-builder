<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class BadgeComponent extends HtmlComponent
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
