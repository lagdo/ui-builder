<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TabsComponent extends HtmlComponent
{
    use Traits\DirectionTrait;

    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'div';
    }

    /**
     * @param string $content
     *
     * @return static
     */
    public function content(string $content): static
    {
        $this->properties['content'] = $content;
        return $this;
    }
}
