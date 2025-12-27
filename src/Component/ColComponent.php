<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\ColInterface;

class ColComponent extends HtmlComponent implements ColInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';

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
