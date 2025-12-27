<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\LabelInterface;

class LabelComponent extends HtmlComponent implements LabelInterface
{
    /**
     * @var string
     */
    public static string $tag = 'label';
}
