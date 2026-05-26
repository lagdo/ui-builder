<?php

namespace Lagdo\UiBuilder\Component\Base;

abstract class TextareaComponent extends InputComponent
{
    use Traits\InputLabelTrait;
    use Traits\InputValidationTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'textarea';
    }
}
