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
    public function onBuild(Element $parent): void
    {}
}
