<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\PanelInterface;
use Lagdo\UiBuilder\Component\PanelBodyInterface;
use Lagdo\UiBuilder\Component\PanelFooterInterface;
use Lagdo\UiBuilder\Component\PanelHeaderInterface;

interface PanelBuilderInterface
{
    /**
     * @param string $style
     *
     * @return PanelInterface
     */
    public function panel(...$arguments): PanelInterface;

    /**
     * @return PanelHeaderInterface
     */
    public function panelHeader(...$arguments): PanelHeaderInterface;

    /**
     * @return PanelBodyInterface
     */
    public function panelBody(...$arguments): PanelBodyInterface;

    /**
     * @return PanelHeaderInterface
     */
    public function panelFooter(...$arguments): PanelFooterInterface;
}
