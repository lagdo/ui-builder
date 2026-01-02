<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

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
        $selected && $this->element()->setAttribute('selected', 'selected');
        return $this;
    }
}
