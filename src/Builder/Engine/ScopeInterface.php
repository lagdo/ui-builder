<?php

namespace Lagdo\UiBuilder\Builder\Engine;

use Lagdo\HtmlBuilder\HtmlComponent;

/**
 * Scope functions for components
 */
interface ScopeInterface
{
    /**
     * @return HtmlComponent
     */
    public function parent(): HtmlComponent;

    /**
     * @return bool
     */
    public function inForm(): bool;
}
