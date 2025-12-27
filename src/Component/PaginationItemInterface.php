<?php

namespace Lagdo\UiBuilder\Component;

interface PaginationItemInterface extends ElementInterface
{
    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active): static;

    /**
     * @param bool $enabled
     *
     * @return static
     */
    public function enabled(bool $enabled): static;

    /**
     * @param int $number
     *
     * @return static
     */
    public function number(int $number): static;
}
