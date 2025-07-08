<?php

namespace Lagdo\UiBuilder\Element;

interface BreadcrumbItemInterface extends ElementInterface
{
    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static;
}
