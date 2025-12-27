<?php

namespace Lagdo\UiBuilder\Component;

interface ColInterface extends ElementInterface
{
    /**
     * @param int $width
     *
     * @return static
     */
    public function width(int $width): static;
}
