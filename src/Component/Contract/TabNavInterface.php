<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface TabNavInterface
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
