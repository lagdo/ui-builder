<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\BadgeComponent;
use Lagdo\UiBuilder\Component\ButtonComponent;
use Lagdo\UiBuilder\Component\ButtonGroupComponent;

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
        return $this->createElementOfClass($this->_buttonGroupComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function button(...$arguments): ButtonComponent
    {
        return $this->createElementOfClass($this->_buttonComponentClass(), $arguments);
    }

    /**
     * @return BadgeComponent
     */
    public function badge(...$arguments): BadgeComponent
    {
        return $this->createElementOfClass($this->_badgeComponentClass(), $arguments);
    }
}
