<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface PanelHeaderInterface
{
    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static;
}
