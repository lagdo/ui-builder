<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\PanelBodyInterface;

class PanelBodyElement extends Element implements PanelBodyInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';

    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static
    {
        return $this;
    }
}
