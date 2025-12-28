<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\PanelComponent;
use Lagdo\UiBuilder\Component\PanelBodyComponent;
use Lagdo\UiBuilder\Component\PanelFooterComponent;
use Lagdo\UiBuilder\Component\PanelHeaderComponent;

trait PanelBuilderTrait
{
    /**
     * @return string
     */
    abstract protected function _panelComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _panelHeaderComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _panelBodyComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _panelFooterComponentClass(): string;

    /**
     * @inheritDoc
     */
    public function panel(...$arguments): PanelComponent
    {
        return $this->createElementOfClass($this->_panelComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function panelHeader(...$arguments): PanelHeaderComponent
    {
        return $this->createElementOfClass($this->_panelHeaderComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function panelBody(...$arguments): PanelBodyComponent
    {
        return $this->createElementOfClass($this->_panelBodyComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function panelFooter(...$arguments): PanelFooterComponent
    {
        return $this->createElementOfClass($this->_panelFooterComponentClass(), $arguments);
    }
}
