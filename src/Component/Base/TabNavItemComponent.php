<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TabNavItemComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return '';
    }

    /**
     * @param string $target
     *
     * @return static
     */
    public function target(string $target): static
    {
        return $this;
    }

    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static
    {
        return $this;
    }
}
