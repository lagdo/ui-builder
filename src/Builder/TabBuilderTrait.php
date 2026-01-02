<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\TabNavComponent;
use Lagdo\UiBuilder\Component\Base\TabNavItemComponent;
use Lagdo\UiBuilder\Component\Base\TabContentComponent;
use Lagdo\UiBuilder\Component\Base\TabContentItemComponent;

trait TabBuilderTrait
{
    /**
     * @return string
     */
    abstract protected function _tabNavComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _tabNavItemComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _tabContentComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _tabContentItemComponentClass(): string;

    /**
     * @inheritDoc
     */
    public function tabNav(...$arguments): TabNavComponent
    {
        return $this->createComponentOfClass($this->_tabNavComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabNavItem(...$arguments): TabNavItemComponent
    {
        return $this->createComponentOfClass($this->_tabNavItemComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabContent(...$arguments): TabContentComponent
    {
        return $this->createComponentOfClass($this->_tabContentComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabContentItem(...$arguments): TabContentItemComponent
    {
        return $this->createComponentOfClass($this->_tabContentItemComponentClass(), $arguments);
    }
}
