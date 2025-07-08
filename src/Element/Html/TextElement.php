<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\TextInterface;

class TextElement extends Element implements TextInterface
{
    /**
     * @var string
     */
    public static string $tag = 'span';
}
