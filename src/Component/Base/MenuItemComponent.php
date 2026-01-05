<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

class MenuItemComponent extends HtmlComponent
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
        if ($active) {
            $this->element()->addClass('active');
            return $this;
        }

        if ($this->element()->hasClass('active')) {
            $this->element()->removeClass('active');
        }
        return $this;
    }

    /**
     * @param bool $disabled
     *
     * @return static
     */
    public function disabled(bool $disabled): static
    {
        if ($disabled) {
            $this->element()->addClass('disabled');
            return $this;
        }

        if ($this->element()->hasClass('disabled')) {
            $this->element()->removeClass('disabled');
        }
        return $this;
    }
}
