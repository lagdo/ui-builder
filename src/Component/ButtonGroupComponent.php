<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\ButtonGroupInterface;

class ButtonGroupComponent extends HtmlComponent implements ButtonGroupInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';

    /**
     * @return static
     */
    public function fullWidth(): static
    {
        return $this;
    }
}
