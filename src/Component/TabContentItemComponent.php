<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\TabContentItemInterface;

class TabContentItemComponent extends HtmlComponent implements TabContentItemInterface
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
