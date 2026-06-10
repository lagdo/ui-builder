<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class TableHeadComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'thead';

    /**
     * @return void
     */
    protected function onCreate(): void
    {
        $this->properties['head'] = true;
    }
}
