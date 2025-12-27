<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\BreadcrumbInterface;

class BreadcrumbElement extends Element implements BreadcrumbInterface
{
    /**
     * @var string
     */
    public static string $tag = 'ol';
}
