<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class TabNavComponent extends UiComponent
{
    /**
     * @var string
     */
    protected string $tagName = '';

    /**
     * @param bool $justified
     *
     * @return static
     */
    public function fill(bool $justified = false): static
    {
        return $this->setProp('filled', true)
            ->setProp('justified', $justified);
    }

    /**
     * @param string $justify
     *
     * @return static
     */
    public function justify(string $justify): static
    {
        return $this->setProp('justify', $justify);
    }
}
