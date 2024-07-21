<?php

namespace Lagdo\UiBuilder\Builder;

interface DropdownInterface
{
    /**
     * @return self
     */
    public function dropdown(): self;

    /**
     * @param string $style
     *
     * @return self
     */
    public function dropdownItem(string $style = 'default'): self;

    /**
     * @return self
     */
    public function dropdownMenu(): self;

    /**
     * @return self
     */
    public function dropdownMenuItem(): self;
}
