<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TableComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = 'table';

    /**
     * @param bool $responsive
     *
     * @return static
     */
    public function responsive(bool $responsive = true): static
    {
        return $this;
    }

    /**
     * @param string $style
     *
     * @return static
     */
    public function skin(string $style): static
    {
        return $this;
    }
}
