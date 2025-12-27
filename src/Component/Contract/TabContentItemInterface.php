<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface TabContentItemInterface
{
    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static;
}
