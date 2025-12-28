<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;

class ButtonComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = 'button';

    /**
     * @param string $icon
     *
     * @return static
     */
    public function addIcon(string $icon): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function addCaret(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function primary(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function secondary(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function large(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function small(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function success(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function info(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function warning(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function danger(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function outline(): static
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
}
