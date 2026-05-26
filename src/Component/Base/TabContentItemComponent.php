<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TabContentItemComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'div';
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
