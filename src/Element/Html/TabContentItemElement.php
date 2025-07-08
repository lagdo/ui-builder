<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\TabContentItemInterface;

class TabContentItemElement extends Element implements TabContentItemInterface
{
    /**
     * @var string
     */
    public static string $tag = 'div';

    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static
    {
        return $this;
    }
}
