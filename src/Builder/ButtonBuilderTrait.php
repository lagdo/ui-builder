<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\BadgeComponent;
use Lagdo\UiBuilder\Component\Base\ButtonComponent;
use Lagdo\UiBuilder\Component\Base\ButtonGroupComponent;

trait ButtonBuilderTrait
{
    /**
     * @return string
     */
    abstract protected function _buttonComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _buttonGroupComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _badgeComponentClass(): string;

    /**
     * @inheritDoc
     */
    public function buttonGroup(...$arguments): ButtonGroupComponent
    {
        return $this->createComponentOfClass($this->_buttonGroupComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function button(...$arguments): ButtonComponent
    {
        return $this->createComponentOfClass($this->_buttonComponentClass(), $arguments);
    }

    /**
     * @return BadgeComponent
     */
    public function badge(...$arguments): BadgeComponent
    {
        return $this->createComponentOfClass($this->_badgeComponentClass(), $arguments);
    }
}
