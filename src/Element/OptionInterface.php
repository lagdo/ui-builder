<?php

namespace Lagdo\UiBuilder\Element;

interface OptionInterface extends ElementInterface
{
    /**
     * @param bool $selected
     *
     * @return static
     */
    public function selected(bool $selected = false): static;
}
