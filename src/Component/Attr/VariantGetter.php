<?php

namespace Lagdo\UiBuilder\Component\Attr;

/**
 * @property-read VariantEnum $default
 * @property-read VariantEnum $outline
 * @property-read VariantEnum $light
 * @property-read VariantEnum $dark
 * @property-read VariantEnum $ghost
 */
class VariantGetter
{
    /**
     * @param string $name
     *
     * @return VariantEnum
     */
    public function __get(string $name): VariantEnum
    {
        return VariantEnum::from($name);
    }
}
