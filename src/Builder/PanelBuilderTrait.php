<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

trait PanelBuilderTrait
{
    /**
     * @var string
     */
    protected string $panelComponentClass = '';

    /**
     * @var string
     */
    protected string $panelHeaderComponentClass = '';

    /**
     * @var string
     */
    protected string $panelBodyComponentClass = '';

    /**
     * @var string
     */
    protected string $panelFooterComponentClass = '';

    /**
     * @inheritDoc
     */
    public function panel(...$arguments): Base\PanelComponent
    {
        return $this->createComponentOfClass($this->panelComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function panelHeader(...$arguments): Base\PanelHeaderComponent
    {
        return $this->createComponentOfClass($this->panelHeaderComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function panelBody(...$arguments): Base\PanelBodyComponent
    {
        return $this->createComponentOfClass($this->panelBodyComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function panelFooter(...$arguments): Base\PanelFooterComponent
    {
        return $this->createComponentOfClass($this->panelFooterComponentClass, $arguments);
    }
}
