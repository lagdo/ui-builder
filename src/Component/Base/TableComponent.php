<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TableComponent extends HtmlComponent
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
        $this->properties['responsive'] = true;
        return $this;
    }

    /**
     * @return static
     */
    public function stripe(): static
    {
        $this->properties['stripe'] = true;
        return $this;
    }

    /**
     * @return static
     */
    public function border(): static
    {
        $this->properties['border'] = true;
        return $this;
    }

    /**
     * @return static
     */
    public function hover(): static
    {
        $this->properties['hover'] = true;
        return $this;
    }
}
