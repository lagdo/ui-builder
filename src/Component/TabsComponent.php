<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class TabsComponent extends UiComponent
{
    use Traits\DirectionTrait;

    /**
     * @var string
     */
    protected string $tagName = 'div';

    /**
     * @param string $content
     *
     * @return static
     */
    public function content(string $content): static
    {
        return $this->setProp('content', $content);
    }
}
