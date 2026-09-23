<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

class GridRowComponent extends UiComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'div';

    /**
     * @inheritDoc
     */
    protected function onCreate(): void
    {
        $this->addBaseClass('pure-g');
    }
}
