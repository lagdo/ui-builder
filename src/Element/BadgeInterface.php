<?php

namespace Lagdo\UiBuilder\Element;

interface BadgeInterface extends ElementInterface
{
    /**
     * @return static
     */
    public function top(): static;

    /**
     * @param string $type
     *
     * @return static
     */
    public function type(string $type): static;

    /**
     * @param string $rounded
     *
     * @return static
     */
    public function rounded(string $rounded): static;

    /**
     * @param string $border
     *
     * @return static
     */
    public function border(string $border): static;
}
