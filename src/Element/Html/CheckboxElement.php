<?php

namespace Lagdo\UiBuilder\Element\Html;

use Lagdo\UiBuilder\Builder\Html\Element;
use Lagdo\UiBuilder\Element\CheckboxInterface;

class CheckboxElement extends Element implements CheckboxInterface
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
