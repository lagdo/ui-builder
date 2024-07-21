<?php

namespace Lagdo\UiBuilder\Builder;

interface TableInterface
{
    /**
     * @param bool $responsive
     * @param string $style
     *
     * @return self
     */
    public function table(bool $responsive, string $style = '', ...$arguments): self;
}
