<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\MenuItemInterface;

class MenuItemComponent extends HtmlComponent implements MenuItemInterface
{
    /**
     * @var string
     */
    public static string $tag = 'a';

    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active): static
    {
        $active && $this->addClass('active');
        return $this;
    }

    /**
     * @param bool $disabled
     *
     * @return static
     */
    public function disabled(bool $disabled): static
    {
        $disabled && $this->addClass('disabled');
        return $this;
    }
}
