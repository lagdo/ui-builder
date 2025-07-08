<?php

namespace Lagdo\UiBuilder\Element;

interface ButtonInterface extends ElementInterface
{
    /**
     * @param string $icon
     *
     * @return static
     */
    public function addIcon(string $icon): static;

    /**
     * @return static
     */
    public function addCaret(): static;

    /**
     * @return static
     */
    public function primary(): static;

    /**
     * @return static
     */
    public function secondary(): static;

    /**
     * @return static
     */
    public function large(): static;

    /**
     * @return static
     */
    public function small(): static;

    /**
     * @return static
     */
    public function success(): static;

    /**
     * @return static
     */
    public function info(): static;

    /**
     * @return static
     */
    public function warning(): static;

    /**
     * @return static
     */
    public function danger(): static;

    /**
     * @return static
     */
    public function outline(): static;

    /**
     * @return static
     */
    public function fullWidth(): static;
}
