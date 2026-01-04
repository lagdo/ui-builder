<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\PanelComponent;
use Lagdo\UiBuilder\Component\Base\PanelBodyComponent;
use Lagdo\UiBuilder\Component\Base\PanelFooterComponent;
use Lagdo\UiBuilder\Component\Base\PanelHeaderComponent;

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
    public function panel(...$arguments): PanelComponent
    {
        return $this->createComponentOfClass($this->panelComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function panelHeader(...$arguments): PanelHeaderComponent
    {
        return $this->createComponentOfClass($this->panelHeaderComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function panelBody(...$arguments): PanelBodyComponent
    {
        return $this->createComponentOfClass($this->panelBodyComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function panelFooter(...$arguments): PanelFooterComponent
    {
        return $this->createComponentOfClass($this->panelFooterComponentClass, $arguments);
    }
}
