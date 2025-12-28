<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;

class OptionComponent extends HtmlComponent
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
