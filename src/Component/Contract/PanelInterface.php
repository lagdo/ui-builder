<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface PanelInterface
{
    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static;
}
