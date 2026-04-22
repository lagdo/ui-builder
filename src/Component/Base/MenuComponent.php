<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class MenuComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = 'ul';

    /**
     * @return static
     */
    abstract public function vertical(): static;

    /**
     * @return static
     */
    abstract public function horizontal(): static;
}
