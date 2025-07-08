<?php

namespace Lagdo\UiBuilder\Element;

interface ColInterface extends ElementInterface
{
    /**
     * @param int $width
     *
     * @return static
     */
    public function width(int $width): static;
}
