<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class CheckboxComponent extends HtmlComponent
{
    use Traits\InputLabelTrait;

    /**
     * @var string
     */
    protected string $tagName = 'input';

    /**
     * @param bool $checked
     *
     * @return static
     */
    public function checked(bool $checked = true): static
    {
        $this->element()->setAttribute('checked', $checked ? 'checked' : false);
        return $this;
    }
}
