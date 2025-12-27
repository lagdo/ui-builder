<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\TabNavInterface;
use Lagdo\UiBuilder\Component\TabNavItemInterface;
use Lagdo\UiBuilder\Component\TabContentInterface;
use Lagdo\UiBuilder\Component\TabContentItemInterface;

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
