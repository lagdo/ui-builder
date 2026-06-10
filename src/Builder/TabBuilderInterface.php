<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

interface TabBuilderInterface
{
    /**
     * @return Component\TabsComponent
     */
    public function tabs(...$arguments): Component\TabsComponent;

    /**
     * @return Component\TabNavComponent
     */
    public function tabNav(...$arguments): Component\TabNavComponent;

    /**
     * @return Component\TabNavItemComponent
     */
    public function tabNavItem(...$arguments): Component\TabNavItemComponent;

    /**
     * @return Component\TabContentComponent
     */
    public function tabContent(...$arguments): Component\TabContentComponent;

    /**
     * @return Component\TabContentItemComponent
     */
    public function tabContentItem(...$arguments): Component\TabContentItemComponent;
}
