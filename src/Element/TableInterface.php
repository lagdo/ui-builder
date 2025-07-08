<?php

namespace Lagdo\UiBuilder\Element;

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
