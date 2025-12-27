<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface PanelFooterInterface
{
    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static;
}
