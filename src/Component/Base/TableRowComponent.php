<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TableRowComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'tr';
    }

    /**
     * @return static
     */
    public function head(): static
    {
        $this->properties['head'] = true;
        return $this;
    }
}
