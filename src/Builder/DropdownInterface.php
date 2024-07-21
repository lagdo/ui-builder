<?php

namespace Lagdo\UiBuilder\Builder;

interface DropdownInterface
{
    /**
     * @return self
     */
    public function dropdown(...$arguments): self;

    /**
     * @param string $style
     *
     * @return self
     */
    public function dropdownItem(string $style = 'default', ...$arguments): self;

    /**
     * @return self
     */
    public function dropdownMenu(...$arguments): self;

    /**
     * @return self
     */
    public function dropdownMenuItem(...$arguments): self;
}
