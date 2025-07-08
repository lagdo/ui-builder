<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Element\PanelInterface;
use Lagdo\UiBuilder\Element\PanelBodyInterface;
use Lagdo\UiBuilder\Element\PanelFooterInterface;
use Lagdo\UiBuilder\Element\PanelHeaderInterface;

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
