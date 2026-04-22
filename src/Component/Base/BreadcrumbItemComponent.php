<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class BreadcrumbItemComponent extends HtmlComponent
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
        $this->element()->removeClass('active');
        if ($active) {
            $this->element()->addClass('active');
        }
        return $this;
    }
}
