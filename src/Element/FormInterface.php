<?php

namespace Lagdo\UiBuilder\Element;

interface FormInterface extends ElementInterface
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
