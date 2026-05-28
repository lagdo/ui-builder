<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class ButtonComponent extends HtmlComponent
{
    use Traits\VisualTrait;
    use Traits\StateTrait;
    use Traits\JustifyTrait;
    use Traits\VariantTrait;
    use Traits\SizeTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'button';
    }

    /**
     * @param string $icon
     *
     * @return static
     */
    public function addIcon(string $icon): static
    {
        $icon = match($icon) {
            'remove' => 'x',
            'edit' => 'pencil',
            'ok' => 'check',
            default => $icon,
        };
        $this->addHtml("<i class=\"fa fa-{$icon}\"></i>");
        return $this;
    }
}
