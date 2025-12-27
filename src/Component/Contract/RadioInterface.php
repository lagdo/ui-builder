<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface RadioInterface
{
    /**
     * @param bool $checked
     *
     * @return static
     */
    public function checked(bool $checked = false): static;
}
