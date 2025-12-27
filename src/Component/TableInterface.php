<?php

namespace Lagdo\UiBuilder\Component;

interface TableInterface extends ElementInterface
{
    /**
     * @param bool $responsive
     *
     * @return static
     */
    public function responsive(bool $responsive = true): static;

    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static;
}
