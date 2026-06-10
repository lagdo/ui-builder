<?php

namespace Lagdo\UiBuilder\Component\Traits;

use Lagdo\UiBuilder\Component\Attr\DirectionEnum;

trait DirectionTrait
{
    /**
     * @param DirectionEnum $direction
     *
     * @return static
     */
    public function direction(DirectionEnum $direction): static
    {
        $this->properties['direction'] = $direction;
        return $this;
    }

    /**
     * @return static
     */
    public function horizontal(): static
    {
        $this->properties['horizontal'] = true;
        $this->properties['vertical'] = false;
        return $this->direction(DirectionEnum::HORIZONTAL);
    }

    /**
     * @return static
     */
    public function vertical(): static
    {
        $this->properties['vertical'] = true;
        $this->properties['horizontal'] = false;
        return $this->direction(DirectionEnum::VERTICAL);
    }
}
