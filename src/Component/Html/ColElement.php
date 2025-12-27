<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\ColInterface;

class ColElement extends Element implements ColInterface
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
