<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\OptionInterface;

class OptionElement extends Element implements OptionInterface
{
    /**
     * @var string
     */
    public static string $tag = 'option';

    /**
     * @inheritDoc
     */
    public function selected(bool $selected = true): static
    {
        $selected && $this->setAttribute('selected', 'selected');
        return $this;
    }
}
