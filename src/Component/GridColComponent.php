<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

class GridColComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'div';

    /**
     * @param int $cols
     * @param int $base
     * @param string $media
     *
     * @return static
     */
    public function unit(int $cols, int $base, string $media = ''): static
    {
        $prefix = $media === '' ? 'pure-u' : "pure-u-$media";
        $this->addBaseClass("$prefix-$cols-$base");
        return $this;
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
