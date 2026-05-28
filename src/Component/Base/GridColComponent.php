<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class GridColComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'div';

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
