<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class TableRowComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'tr';

    /**
     * @return static
     */
    public function head(): static
    {
        $this->properties['head'] = true;
        return $this;
    }
}
