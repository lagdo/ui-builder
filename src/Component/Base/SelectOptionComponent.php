<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class SelectOptionComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'option';
    }

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
