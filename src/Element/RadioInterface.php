<?php

namespace Lagdo\UiBuilder\Element;

interface RadioInterface extends ElementInterface
{
    /**
     * @param bool $checked
     *
     * @return static
     */
    public function checked(bool $checked = false): static;
}
