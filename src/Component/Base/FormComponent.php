<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class FormComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'form';

    /**
     * @return static
     */
    public function validated(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function wrapped(): static
    {
        return $this;
    }
}
