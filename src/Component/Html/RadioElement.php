<?php

namespace Lagdo\UiBuilder\Component\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Component\RadioInterface;

class RadioElement extends Element implements RadioInterface
{
    /**
     * @var string
     */
    public static string $tag = 'input';

    /**
     * @inheritDoc
     */
    public function checked(bool $checked = false): static
    {
        $checked && $this->setAttribute('checked', 'checked');
        return $this;
    }
}
