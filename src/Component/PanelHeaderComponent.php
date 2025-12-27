<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\PanelHeaderInterface;

class PanelHeaderComponent extends HtmlComponent implements PanelHeaderInterface
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
