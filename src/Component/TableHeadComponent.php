<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\UiComponent;

abstract class TableHeadComponent extends UiComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'thead';

    /**
     * @return void
     */
    protected function onCreate(): void
    {
        $this->setProp('head', true);
    }
}
