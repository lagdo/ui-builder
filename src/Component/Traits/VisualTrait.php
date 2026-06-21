<?php

namespace Lagdo\UiBuilder\Component\Traits;

use Lagdo\UiBuilder\Component\Attr\VisualEnum;

trait VisualTrait
{
    /**
     * @param VisualEnum $visual
     *
     * @return static
     */
    public function visual(VisualEnum $visual): static
    {
        $this->properties['visual'] = $visual;
        return $this;
    }

    /**
     * @return static
     */
    public function primary(): static
    {
        return $this->visual(VisualEnum::PRIMARY);
    }

    /**
     * @return static
     */
    public function secondary(): static
    {
        return $this->visual(VisualEnum::SECONDARY);
    }

    /**
     * @return static
     */
    public function success(): static
    {
        return $this->visual(VisualEnum::SUCCESS);
    }

    /**
     * @return static
     */
    public function info(): static
    {
        return $this->visual(VisualEnum::INFO);
    }

    /**
     * @return static
     */
    public function warning(): static
    {
        return $this->visual(VisualEnum::WARNING);
    }

    /**
     * @return static
     */
    public function danger(): static
    {
        return $this->visual(VisualEnum::DANGER);
    }
}
