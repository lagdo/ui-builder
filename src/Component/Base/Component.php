<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;

/**
 * The common base class for all components, virtual or real.
 */
abstract class Component
{
    /**
     * @return void
     */
    protected function onCreate(): void
    {}

    /**
     * @param HtmlComponent $parent
     *
     * @return void
     */
    public function onBuild(HtmlComponent $parent): void
    {}
}
