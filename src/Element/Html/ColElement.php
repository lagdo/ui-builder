<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\ColInterface;

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
