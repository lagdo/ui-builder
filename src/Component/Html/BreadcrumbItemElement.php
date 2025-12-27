<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\BreadcrumbItemInterface;

class BreadcrumbItemElement extends Element implements BreadcrumbItemInterface
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
