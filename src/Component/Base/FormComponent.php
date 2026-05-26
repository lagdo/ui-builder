<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class FormComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'form';
    }

    /**
     * @return static
     */
    public function validated(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function vertical(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function horizontal(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function wrapped(): static
    {
        return $this;
    }
}
