<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\BreadcrumbItemInterface;

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
        $active && $this->appendClass('active');
        return $this;
    }
}
