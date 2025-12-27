<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface PanelBodyInterface
{
    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static;
}
