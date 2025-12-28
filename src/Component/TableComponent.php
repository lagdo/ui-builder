<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;

class TableComponent extends HtmlComponent
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
    public function look(string $style): static
    {
        return $this;
    }
}
