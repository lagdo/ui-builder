<?php

namespace Lagdo\UiBuilder\Component\Base\Traits;

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
}
