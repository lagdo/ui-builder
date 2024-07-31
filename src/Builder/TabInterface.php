<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface TabInterface
{
    /**
     * @param string $target The id of the tab content element
     *
     * @return BuilderInterface
     */
    public function tabNav(string $target = '', ...$arguments): BuilderInterface;

    /**
     * @param string $id
     * @param bool $active
     *
     * @return BuilderInterface
     */
    public function tabNavItem(string $id, bool $active = false, ...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function tabContent(...$arguments): BuilderInterface;

    /**
     * @param string $id
     * @param bool $active
     *
     * @return BuilderInterface
     */
    public function tabContentItem(string $id, bool $active = false, ...$arguments): BuilderInterface;
}
