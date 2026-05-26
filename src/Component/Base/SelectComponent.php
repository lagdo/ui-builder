<?php

namespace Lagdo\UiBuilder\Component\Base;

abstract class SelectComponent extends InputComponent
{
    use Traits\InputLabelTrait;
    use Traits\InputValidationTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'select';
    }
}
