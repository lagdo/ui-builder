<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class BreadcrumbItemComponent extends HtmlComponent
{
    use Traits\StateTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'li';
    }
}
