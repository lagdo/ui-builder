<?php

namespace Lagdo\UiBuilder\Component\Attr;

/**
 * @property-read SizeEnum $default
 * @property-read SizeEnum $large
 * @property-read SizeEnum $small
 */
class SizeGetter
{
    /**
     * @param string $name
     *
     * @return SizeEnum
     */
    public function __get(string $name): SizeEnum
    {
        return SizeEnum::from($name);
    }
}
