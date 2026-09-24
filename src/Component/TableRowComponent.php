<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class TableRowComponent extends UiComponent
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
        return $this->setProp('head', true);
    }
}
