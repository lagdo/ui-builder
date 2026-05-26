<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class CardFooterComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'div';
    }

    /**
     * @param string $style
     *
     * @return static
     */
    public function skin(string $style): static
    {
        return $this;
    }
}
