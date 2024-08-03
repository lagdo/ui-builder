<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface LayoutInterface
{
    /**
     * @return BuilderInterface
     */
    public function row(...$arguments): BuilderInterface;

    /**
     * @param int $width
     *
     * @return BuilderInterface
     */
    public function col(int $width = 12, ...$arguments): BuilderInterface;
}
