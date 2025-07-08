<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Element\TabNavInterface;
use Lagdo\UiBuilder\Element\TabNavItemInterface;
use Lagdo\UiBuilder\Element\TabContentInterface;
use Lagdo\UiBuilder\Element\TabContentItemInterface;

interface TabBuilderInterface
{
    /**
     * @return TabNavInterface
     */
    public function tabNav(...$arguments): TabNavInterface;

    /**
     * @return TabNavItemInterface
     */
    public function tabNavItem(...$arguments): TabNavItemInterface;

    /**
     * @return TabContentInterface
     */
    public function tabContent(...$arguments): TabContentInterface;

    /**
     * @return TabContentItemInterface
     */
    public function tabContentItem(...$arguments): TabContentItemInterface;
}
