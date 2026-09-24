<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class TableComponent extends UiComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'table';

    /**
     * @return static
     */
    public function responsive(): static
    {
        return $this->setProp('responsive', true);
    }

    /**
     * @return static
     */
    public function stripe(): static
    {
        return $this->setProp('stripe', true);
    }

    /**
     * @return static
     */
    public function border(): static
    {
        return $this->setProp('border', true);
    }

    /**
     * @return static
     */
    public function hover(): static
    {
        return $this->setProp('hover', true);
    }
}
