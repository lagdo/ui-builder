<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class MenuComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'ul';
    }

    /**
     * @return static
     */
    abstract public function vertical(): static;

    /**
     * @return static
     */
    abstract public function horizontal(): static;
}
