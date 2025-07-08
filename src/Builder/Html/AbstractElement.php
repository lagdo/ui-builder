<?php

namespace Lagdo\UiBuilder\Builder\Html;

abstract class AbstractElement
{
    /**
     * @return void
     */
    protected function onCreate(): void
    {}

    /**
     * @param Element $parent
     *
     * @return void
     */
    protected function onBuild(Element $parent): void
    {}
}
