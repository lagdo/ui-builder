<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

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
