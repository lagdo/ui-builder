<?php

namespace Lagdo\UiBuilder\Component;

interface TabNavItemInterface extends ElementInterface
{
    /**
     * @param string $target
     *
     * @return static
     */
    public function target(string $target): static;

    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active = false): static;

    /**
     * @param bool $enabled
     *
     * @return static
     */
    public function enabled(bool $enabled): static;
}
