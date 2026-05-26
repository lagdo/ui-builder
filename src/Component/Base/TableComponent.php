<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TableComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'table';
    }

    /**
     * @return static
     */
    public function responsive(): static
    {
        $this->properties['responsive'] = true;
        return $this;
    }

    /**
     * @param string $style
     *
     * @return static
     */
    public function skin(string $style): static
    {
        $this->properties['style'] = $style;
        return $this;
    }
}
