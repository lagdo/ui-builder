<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\BadgeInterface;

class BadgeElement extends Element implements BadgeInterface
{
    /**
     * @var string
     */
    public static string $tag = 'span';

    /**
     * @return static
     */
    public function top(): static
    {
        return $this;
    }

    /**
     * @param string $type
     *
     * @return static
     */
    public function type(string $type): static
    {
        return $this;
    }

    /**
     * @param string $rounded
     *
     * @return static
     */
    public function rounded(string $rounded): static
    {
        return $this;
    }

    /**
     * @param string $border
     *
     * @return static
     */
    public function border(string $border): static
    {
        return $this;
    }
}
