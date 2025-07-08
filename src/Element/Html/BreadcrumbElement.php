<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\BreadcrumbInterface;

class BreadcrumbElement extends Element implements BreadcrumbInterface
{
    /**
     * @var string
     */
    public static string $tag = 'ol';
}
