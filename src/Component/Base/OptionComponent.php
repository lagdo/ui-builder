<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

class OptionComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = 'option';

    /**
     * @param bool $selected
     *
     * @return static
     */
    public function selected(bool $selected = true): static
    {
        $this->element()->setAttribute('selected', $selected ? 'selected' : false);
        return $this;
    }
}
