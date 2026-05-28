<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class BadgeComponent extends HtmlComponent
{
    use Traits\VisualTrait;
    use Traits\VariantTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'span';
    }

    /**
     * @return static
     */
    public function top(): static
    {
        return $this;
    }
}
