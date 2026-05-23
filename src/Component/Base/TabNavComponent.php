<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TabNavComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = '';

    /**
     * @param string $style
     *
     * @return static
     */
    public function look(string $style): static
    {
        $this->properties['style'] = $style;
        return $this;
    }

    /**
     * @return static
     */
    public function fill(): static
    {
        $this->properties['filled'] = true;
        return $this;
    }

    /**
     * @param string $justify
     *
     * @return static
     */
    public function justify(string $justify): static
    {
        $this->properties['justify'] = $justify;
        return $this;
    }
}
