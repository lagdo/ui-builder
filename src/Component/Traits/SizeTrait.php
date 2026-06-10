<?php

namespace Lagdo\UiBuilder\Component\Traits;

use Lagdo\UiBuilder\Component\Attr\SizeEnum;

trait SizeTrait
{
    /**
     * @param SizeEnum $size
     *
     * @return static
     */
    public function size(SizeEnum $size): static
    {
        $this->properties['size'] = $size;
        return $this;
    }

    /**
     * @return static
     */
    public function large(): static
    {
        return $this->size(SizeEnum::LARGE);
    }

    /**
     * @return static
     */
    public function small(): static
    {
        return $this->size(SizeEnum::SMALL);
    }
}
