<?php

namespace Lagdo\UiBuilder\Component;

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
     * @return void
     */
    protected function onBuild(): void
    {}
}
