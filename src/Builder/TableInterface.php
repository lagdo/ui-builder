<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface TableInterface
{
    /**
     * @param bool $responsive
     * @param string $style
     *
     * @return BuilderInterface
     */
    public function table(bool $responsive, string $style = '', ...$arguments): BuilderInterface;
}
