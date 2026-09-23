<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class PaginationItemComponent extends UiComponent
{
    use Traits\StateTrait;

    /**
     * @var string
     */
    protected string $tagName = 'a';

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
