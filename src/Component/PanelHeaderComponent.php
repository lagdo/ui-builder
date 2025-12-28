<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;

class PanelHeaderComponent extends HtmlComponent
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
    public function look(string $style): static
    {
        return $this;
    }
}
