<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\OptionInterface;

class OptionElement extends Element implements OptionInterface
{
    /**
     * @var string
     */
    public static string $tag = 'option';

    /**
     * @inheritDoc
     */
    public function selected(bool $selected = false): static
    {
        $selected && $this->setAttribute('selected', 'selected');
        return $this;
    }
}
