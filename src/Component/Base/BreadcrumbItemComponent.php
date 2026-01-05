<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

class BreadcrumbItemComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = 'li';

    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static
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
}
