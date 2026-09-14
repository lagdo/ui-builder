<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

class GridRowComponent extends HtmlComponent
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
