<?php

namespace Lagdo\UiBuilder\Component;

interface BreadcrumbItemInterface extends ElementInterface
{
    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static;
}
