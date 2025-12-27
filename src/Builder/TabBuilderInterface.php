<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\TabNavComponent;
use Lagdo\UiBuilder\Component\TabNavItemComponent;
use Lagdo\UiBuilder\Component\TabContentComponent;
use Lagdo\UiBuilder\Component\TabContentItemComponent;

interface TabBuilderInterface
{
    /**
     * @return TabNavComponent
     */
    public function tabNav(...$arguments): TabNavComponent;

    /**
     * @return TabNavItemComponent
     */
    public function tabNavItem(...$arguments): TabNavItemComponent;

    /**
     * @return TabContentComponent
     */
    public function tabContent(...$arguments): TabContentComponent;

    /**
     * @return TabContentItemComponent
     */
    public function tabContentItem(...$arguments): TabContentItemComponent;
}
