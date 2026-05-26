<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TableHeadComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'thead';
    }

    /**
     * @return void
     */
    protected function onCreate(): void
    {
        $this->properties['head'] = true;
    }
}
