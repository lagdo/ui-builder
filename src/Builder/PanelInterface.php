<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface PanelInterface
{
    /**
     * @param string $style
     *
     * @return BuilderInterface
     */
    public function panel(string $style = 'default', ...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function panelHeader(...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function panelBody(...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function panelFooter(...$arguments): BuilderInterface;
}
