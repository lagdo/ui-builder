<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TabNavItemComponent extends HtmlComponent
{
    use Traits\StateTrait;

    /**
     * @var string
     */
    protected string $tagName = '';

    /**
     * @param string $target
     *
     * @return static
     */
    public function target(string $target): static
    {
        return $this;
    }
}
