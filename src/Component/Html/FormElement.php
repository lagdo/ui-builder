<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\FormInterface;

class FormElement extends Element implements FormInterface
{
    /**
     * @var string
     */
    public static string $tag = 'form';

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
