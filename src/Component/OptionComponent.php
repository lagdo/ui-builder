<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Contract\OptionInterface;

class OptionComponent extends HtmlComponent implements OptionInterface
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
