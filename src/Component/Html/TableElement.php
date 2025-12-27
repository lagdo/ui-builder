<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\TableInterface;

class TableElement extends Element implements TableInterface
{
    /**
     * @var string
     */
    public static string $tag = 'table';

    /**
     * @param bool $responsive
     *
     * @return static
     */
    public function responsive(bool $responsive = true): static
    {
        return $this;
    }

    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static
    {
        return $this;
    }
}
