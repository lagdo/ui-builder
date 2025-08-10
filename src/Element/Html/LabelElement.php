<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\LabelInterface;

class LabelElement extends Element implements LabelInterface
{
    /**
     * @var string
     */
    public static string $tag = 'label';
}
