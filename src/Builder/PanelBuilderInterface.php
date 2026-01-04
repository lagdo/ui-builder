<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface PanelBuilderInterface
{
    /**
     * @param string $style
     *
     * @return Base\PanelComponent
     */
    public function panel(...$arguments): Base\PanelComponent;

    /**
     * @return Base\PanelHeaderComponent
     */
    public function panelHeader(...$arguments): Base\PanelHeaderComponent;

    /**
     * @return Base\PanelBodyComponent
     */
    public function panelBody(...$arguments): Base\PanelBodyComponent;

    /**
     * @return Base\PanelHeaderComponent
     */
    public function panelFooter(...$arguments): Base\PanelFooterComponent;
}
