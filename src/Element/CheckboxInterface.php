<?php

namespace Lagdo\UiBuilder\Element;

interface CheckboxInterface extends ElementInterface
{
    /**
     * @param bool $checked
     *
     * @return static
     */
    public function checked(bool $checked = false): static;
}
