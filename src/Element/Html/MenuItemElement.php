<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\MenuItemInterface;

class MenuItemElement extends Element implements MenuItemInterface
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
        $active && $this->appendClass('active');
        return $this;
    }

    /**
     * @param bool $disabled
     *
     * @return static
     */
    public function disabled(bool $disabled): static
    {
        $disabled && $this->appendClass('disabled');
        return $this;
    }
}
