<?php

namespace Lagdo\UiBuilder\Component;

interface TabContentItemInterface extends ElementInterface
{
    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static;
}
