<?php

namespace Lagdo\UiBuilder\Component\Attr;

/**
 * @property-read LevelEnum $info
 * @property-read LevelEnum $success
 * @property-read LevelEnum $warning
 * @property-read LevelEnum $danger
 */
class LevelGetter
{
    /**
     * @param string $name
     *
     * @return LevelEnum
     */
    public function __get(string $name): LevelEnum
    {
        return LevelEnum::from($name);
    }
}
