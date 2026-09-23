<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class BreadcrumbComponent extends UiComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'ol';
}
