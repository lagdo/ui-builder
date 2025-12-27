<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface DropdownItemInterface
{
    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static;
}
