<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface HtmlInterface
{
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
