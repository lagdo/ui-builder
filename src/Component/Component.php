<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\Component\HtmlComponent;

/**
 * The common base class for all components, virtual or real.
 */
abstract class Component
{
    /**
     * Callback on component creation.
     *
     * @return void
     */
    protected function onCreate(): void
    {}

    /**
     * Callback on component parent-child relation.
     *
     * @param HtmlComponent $parent
     *
     * @return void
     */
    protected function onBuild(HtmlComponent $parent): void
    {}
}
