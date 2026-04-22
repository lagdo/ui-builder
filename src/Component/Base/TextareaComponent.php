<?php

namespace Lagdo\UiBuilder\Component\Base;

abstract class TextareaComponent extends InputComponent
{
    use Traits\InputLabelTrait;
    use Traits\InputValidationTrait;

    /**
     * @var string
     */
    public static string $tag = 'textarea';
}
