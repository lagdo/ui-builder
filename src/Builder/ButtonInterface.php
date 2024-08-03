<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface ButtonInterface
{
    /**
     * @param bool $fullWidth
     *
     * @return BuilderInterface
     */
    public function buttonGroup(bool $fullWidth, ...$arguments): BuilderInterface;

    /**
     * @param int $flags
     *
     * @return BuilderInterface
     */
    public function button(int $flags = 0, ...$arguments): BuilderInterface;

    /**
     * @param string $icon
     *
     * @return BuilderInterface
     */
    public function addIcon(string $icon): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function addCaret(): BuilderInterface;
}
