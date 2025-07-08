<?php

namespace Lagdo\UiBuilder\Element;

interface TabNavInterface extends ElementInterface
{
    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static;

    /**
     * @return static
     */
    public function vertical(): static;

    /**
     * @return static
     */
    public function fullWidth(): static;

    /**
     * @param string $justify
     *
     * @return static
     */
    public function justify(string $justify): static;
}
