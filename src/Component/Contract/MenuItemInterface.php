<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface MenuItemInterface
{
    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active): static;

    /**
     * @param bool $disabled
     *
     * @return static
     */
    public function disabled(bool $disabled): static;
}
