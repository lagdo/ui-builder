<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface BreadcrumbItemInterface
{
    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static;
}
