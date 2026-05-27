<?php

namespace Lagdo\UiBuilder\Component\Attr;

/**
 * @property-read DirectionEnum $horizontal
 * @property-read DirectionEnum $vertical
 */
class DirectionGetter
{
    /**
     * @param string $name
     *
     * @return DirectionEnum
     */
    public function __get(string $name): DirectionEnum
    {
        return DirectionEnum::from($name);
    }
}
