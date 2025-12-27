<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\LabelInterface;

class LabelElement extends Element implements LabelInterface
{
    /**
     * @var string
     */
    public static string $tag = 'label';
}
