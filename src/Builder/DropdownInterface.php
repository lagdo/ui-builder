<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface DropdownInterface
{
    /**
     * @return BuilderInterface
     */
    public function dropdown(...$arguments): BuilderInterface;

    /**
     * @param string $style
     *
     * @return BuilderInterface
     */
    public function dropdownItem(string $style = 'default', ...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function dropdownMenu(...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function dropdownMenuItem(...$arguments): BuilderInterface;
}
