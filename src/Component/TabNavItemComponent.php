<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\TabNavItemInterface;

class TabNavItemComponent extends HtmlComponent implements TabNavItemInterface
{
    /**
     * @var string
     */
    public static string $tag = '';

    /**
     * @param string $target
     *
     * @return static
     */
    public function target(string $target): static
    {
        return $this;
    }

    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static
    {
        return $this;
    }

    /**
     * @param bool $enabled
     *
     * @return static
     */
    public function enabled(bool $enabled): static
    {
        return $this;
    }
}
