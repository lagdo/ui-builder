<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\BreadcrumbItemInterface;

class BreadcrumbItemComponent extends HtmlComponent implements BreadcrumbItemInterface
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
        $active && $this->addClass('active');
        return $this;
    }
}
