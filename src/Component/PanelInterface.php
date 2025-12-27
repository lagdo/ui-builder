<?php

namespace Lagdo\UiBuilder\Component;

interface PanelInterface extends ElementInterface
{
    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static;
}
