<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class PaginationItemComponent extends HtmlComponent
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
