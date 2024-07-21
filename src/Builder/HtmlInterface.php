<?php

namespace Lagdo\UiBuilder\Builder;

interface HtmlInterface
{
    /**
     * @param string $icon
     *
     * @return self
     */
    public function addIcon(string $icon): self;

    /**
     * @return self
     */
    public function addCaret(): self;

    /**
     * @return self
     */
    public function row(): self;

    /**
     * @param int $width
     *
     * @return self
     */
    public function col(int $width = 12): self;
}
