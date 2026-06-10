<?php

namespace Lagdo\UiBuilder\Component;

abstract class SelectComponent extends InputComponent
{
    use Traits\InputLabelTrait;
    use Traits\InputValidationTrait;

    /**
     * @var string
     */
    protected string $tagName = 'select';
}
