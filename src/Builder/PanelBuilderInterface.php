<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\PanelComponent;
use Lagdo\UiBuilder\Component\PanelBodyComponent;
use Lagdo\UiBuilder\Component\PanelFooterComponent;
use Lagdo\UiBuilder\Component\PanelHeaderComponent;

interface PanelBuilderInterface
{
    /**
     * @param string $style
     *
     * @return PanelComponent
     */
    public function panel(...$arguments): PanelComponent;

    /**
     * @return PanelHeaderComponent
     */
    public function panelHeader(...$arguments): PanelHeaderComponent;

    /**
     * @return PanelBodyComponent
     */
    public function panelBody(...$arguments): PanelBodyComponent;

    /**
     * @return PanelHeaderComponent
     */
    public function panelFooter(...$arguments): PanelFooterComponent;
}
