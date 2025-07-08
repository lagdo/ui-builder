<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\TabNavInterface;

class TabNavElement extends Element implements TabNavInterface
{
    /**
     * @var string
     */
    public static string $tag = '';

    /**
     * @param string $style
     *
     * @return static
     */
    public function style(string $style): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function vertical(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function fullWidth(): static
    {
        return $this;
    }

    /**
     * @param string $justify
     *
     * @return static
     */
    public function justify(string $justify): static
    {
        return $this;
    }
}
