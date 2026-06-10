<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class CheckboxComponent extends HtmlComponent
{
    use Traits\InputLabelTrait;
    use Traits\InputValidationTrait;

    /**
     * @var string
     */
    protected string $tagName = 'input';

    /**
     * @param bool $checked
     *
     * @return static
     */
    public function checked(bool $checked = false): static
    {
        $this->element()->setAttribute('checked', $checked ? 'checked' : false);
        return $this;
    }
}
