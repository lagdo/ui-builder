<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface OptionInterface
{
    /**
     * @param bool $selected
     *
     * @return static
     */
    public function selected(bool $selected = false): static;
}
