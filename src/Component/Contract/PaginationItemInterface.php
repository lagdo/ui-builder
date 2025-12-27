<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface PaginationItemInterface
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
