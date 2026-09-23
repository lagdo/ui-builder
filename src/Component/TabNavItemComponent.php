<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class TabNavItemComponent extends UiComponent
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
