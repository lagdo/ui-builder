<?php

namespace Lagdo\UiBuilder\Element;

interface TabContentItemInterface extends ElementInterface
{
    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static;
}
