<?php

namespace Lagdo\UiBuilder\Component\Attr;

/**
 * @property-read VisualEnum $primary
 * @property-read VisualEnum $secondary
 */
class VisualGetter
{
    /**
     * @param string $name
     *
     * @return VisualEnum
     */
    public function __get(string $name): VisualEnum
    {
        return VisualEnum::from($name);
    }
}
