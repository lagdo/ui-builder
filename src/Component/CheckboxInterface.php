<?php

namespace Lagdo\UiBuilder\Component;

interface CheckboxInterface extends ElementInterface
{
    /**
     * @param bool $checked
     *
     * @return static
     */
    public function checked(bool $checked = false): static;
}
