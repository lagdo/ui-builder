<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\TabNavItemInterface;

class TabNavItemElement extends Element implements TabNavItemInterface
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
