<?php

namespace Lagdo\UiBuilder\Component;

interface OptionInterface extends ElementInterface
{
    /**
     * @param bool $selected
     *
     * @return static
     */
    public function selected(bool $selected = false): static;
}
