<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class CheckboxComponent extends HtmlComponent
{
    use Traits\InputLabelTrait;
    use Traits\InputValidationTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'input';
    }

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
