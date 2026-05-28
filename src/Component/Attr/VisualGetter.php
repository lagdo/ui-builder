<?php

namespace Lagdo\UiBuilder\Component\Attr;

/**
 * @property-read VisualEnum $primary
 * @property-read VisualEnum $secondary
 * @property-read VisualEnum $info
 * @property-read VisualEnum $success
 * @property-read VisualEnum $warning
 * @property-read VisualEnum $danger
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
