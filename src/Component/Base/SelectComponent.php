<?php

namespace Lagdo\UiBuilder\Component\Base;

abstract class SelectComponent extends InputComponent
{
    use Traits\InputLabelTrait;
    use Traits\InputValidationTrait;

    /**
     * @var string
     */
    public static string $tag = 'select';
}
