<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\InputGroupInterface;

class InputGroupElement extends Element implements InputGroupInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';
}
