<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\PanelHeaderInterface;

class PanelHeaderElement extends Element implements PanelHeaderInterface
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
