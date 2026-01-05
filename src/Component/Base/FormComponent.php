<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

class FormComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = 'form';

    /**
     * @param bool $validated
     *
     * @return static
     */
    public function validated(bool $validated): static
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function horizontal(bool $horizontal = true): static
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function wrapped(bool $wrapped = true): static
    {
        return $this;
    }
}
