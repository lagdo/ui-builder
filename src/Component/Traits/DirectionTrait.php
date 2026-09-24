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
        return $this->setProp('direction', $direction);
    }

    /**
     * @return static
     */
    public function horizontal(): static
    {
        return $this->setProp('horizontal', true)
            ->setProp('vertical', false)
            ->direction(DirectionEnum::HORIZONTAL);
    }

    /**
     * @return static
     */
    public function vertical(): static
    {
        return $this->setProp('vertical', true)
            ->setProp('horizontal', false)
            ->direction(DirectionEnum::VERTICAL);
    }
}
