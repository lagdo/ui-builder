<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\TabNavComponent;
use Lagdo\UiBuilder\Component\Base\TabNavItemComponent;
use Lagdo\UiBuilder\Component\Base\TabContentComponent;
use Lagdo\UiBuilder\Component\Base\TabContentItemComponent;

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
