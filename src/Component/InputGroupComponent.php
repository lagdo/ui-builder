<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\InputGroupInterface;

class InputGroupComponent extends HtmlComponent implements InputGroupInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
