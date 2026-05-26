<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TableDataComponent extends HtmlComponent
{
    /**
     * @return string
     */
    protected function tagName(): string
    {
        return 'td';
    }

    /**
     * @return void
     */
    protected function onBuild(): void
    {
        // Change the tag to "th", if necessary.
        if ($this->parentProp(2, 'head', false)) {
            $this->element()->setTag('th');
        }
    }

    /**
     * @return static
     */
    public function head(): static
    {
        $this->properties['head'] = true;
        return $this;
    }
}
