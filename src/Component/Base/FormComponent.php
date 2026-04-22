<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class FormComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = 'form';

    /**
     * @return static
     */
    public function validated(): static
    {
        return $this;
    }

    /**
     * @param bool $horizontal
     *
     * @return static
     */
    public function horizontal(bool $horizontal = true): static
    {
        return $this;
    }

    /**
     * @param bool $wrapped
     *
     * @return static
     */
    public function wrapped(bool $wrapped = true): static
    {
        return $this;
    }
}
