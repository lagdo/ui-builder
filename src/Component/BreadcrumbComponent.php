<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class BreadcrumbComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'ol';
}
