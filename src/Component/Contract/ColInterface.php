<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface ColInterface
{
    /**
     * @param int $width
     *
     * @return static
     */
    public function width(int $width): static;
}
