<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class GridColComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'div';
    }

    /**
     * @param int $width
     *
     * @return static
     */
    public function width(int $width): static
    {
        return $this;
    }
}
