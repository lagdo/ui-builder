<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\BreadcrumbInterface;

class BreadcrumbComponent extends HtmlComponent implements BreadcrumbInterface
{
    /**
     * @var string
     */
    public static string $tag = 'ol';
}
