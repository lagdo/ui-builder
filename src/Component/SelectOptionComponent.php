<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class SelectOptionComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'option';

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
