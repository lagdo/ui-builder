<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class InputComponent extends HtmlComponent
{
    use Traits\InputLabelTrait;
    use Traits\InputValidationTrait;

    /**
     * @var string
     */
    public static string $tag = 'input';
}
