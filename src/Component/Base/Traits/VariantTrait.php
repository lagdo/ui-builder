<?php

namespace Lagdo\UiBuilder\Component\Base\Traits;

use Lagdo\UiBuilder\Component\Attr\VariantEnum;

trait VariantTrait
{
    /**
     * @param VariantEnum $variant
     *
     * @return static
     */
    public function variant(VariantEnum $variant): static
    {
        $this->properties['variant'] = $variant;
        return $this;
    }

    /**
     * @return static
     */
    public function outline(): static
    {
        $this->properties['outline'] = true;
        return $this->variant(VariantEnum::OUTLINE);
    }

    /**
     * @return static
     */
    public function light(): static
    {
        return $this->variant(VariantEnum::LIGHT);
    }

    /**
     * @return static
     */
    public function ghost(): static
    {
        return $this->variant(VariantEnum::GHOST);
    }
}
