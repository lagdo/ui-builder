<?php

namespace Lagdo\UiBuilder\Component\Base\Traits;

use Lagdo\UiBuilder\Component\Attr\JustifyEnum;

trait JustifyTrait
{
    /**
     * @param JustifyEnum $justify
     *
     * @return static
     */
    public function justify(JustifyEnum $justify): static
    {
        $this->properties['justify'] = $justify;
        return $this;
    }

    /**
     * @return static
     */
    public function fullWidth(): static
    {
        $this->properties['fullWidth'] = true;
        return $this->justify(JustifyEnum::FULL);
    }
}
