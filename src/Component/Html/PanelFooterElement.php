<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\PanelFooterInterface;

class PanelFooterElement extends Element implements PanelFooterInterface
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
