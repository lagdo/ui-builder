<?php

namespace Lagdo\UiBuilder\Component\Contract;

interface FormInterface
{
    /**
     * @param bool $horizontal
     *
     * @return static
     */
    public function horizontal(bool $horizontal = true): static;

    /**
     * @param bool $wrapped
     *
     * @return static
     */
    public function wrapped(bool $wrapped = true): static;
}
