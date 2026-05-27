<?php

namespace Lagdo\UiBuilder\Component\Attr;

/**
 * @property-read JustifyEnum $start
 * @property-read JustifyEnum $center
 * @property-read JustifyEnum $end
 * @property-read JustifyEnum $full
 */
class JustifyGetter
{
    /**
     * @param string $name
     *
     * @return JustifyEnum
     */
    public function __get(string $name): JustifyEnum
    {
        return JustifyEnum::from($name);
    }
}
