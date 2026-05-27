<?php

namespace Lagdo\UiBuilder\Component\Attr;

/**
 * @property-read AlertEnum $info
 * @property-read AlertEnum $success
 * @property-read AlertEnum $warning
 * @property-read AlertEnum $danger
 */
class AlertGetter
{
    /**
     * @param string $name
     *
     * @return AlertEnum
     */
    public function __get(string $name): AlertEnum
    {
        return AlertEnum::from($name);
    }
}
