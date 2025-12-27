<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\PaginationItemInterface;

class PaginationItemElement extends Element implements PaginationItemInterface
{
    /**
     * @var string
     */
    public static string $tag = 'a';

    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active): static
    {
        return $this;
    }

    /**
     * @param bool $enabled
     *
     * @return static
     */
    public function enabled(bool $enabled): static
    {
        return $this;
    }

    /**
     * @param int $number
     *
     * @return static
     */
    public function number(int $number): static
    {
        return $this;
    }
}
