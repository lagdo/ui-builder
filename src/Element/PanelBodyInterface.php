<?php

namespace Lagdo\UiBuilder\Element;

interface PanelBodyInterface extends ElementInterface
{
    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static;
}
