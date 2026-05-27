<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TabNavComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return '';
    }

    /**
     * @param bool $justified
     *
     * @return static
     */
    public function fill(bool $justified = false): static
    {
        $this->properties['filled'] = true;
        $this->properties['justified'] = $justified;
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
