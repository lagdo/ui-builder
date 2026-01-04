<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface TabBuilderInterface
{
    /**
     * @return Base\TabNavComponent
     */
    public function tabNav(...$arguments): Base\TabNavComponent;

    /**
     * @return Base\TabNavItemComponent
     */
    public function tabNavItem(...$arguments): Base\TabNavItemComponent;

    /**
     * @return Base\TabContentComponent
     */
    public function tabContent(...$arguments): Base\TabContentComponent;

    /**
     * @return Base\TabContentItemComponent
     */
    public function tabContentItem(...$arguments): Base\TabContentItemComponent;
}
