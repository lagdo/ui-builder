<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\CheckboxInterface;

class CheckboxComponent extends HtmlComponent implements CheckboxInterface
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
