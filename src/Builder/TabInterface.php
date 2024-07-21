<?php

namespace Lagdo\UiBuilder\Builder;

interface TabInterface
{
    /**
     * @param string $target The id of the tab content element
     *
     * @return self
     */
    public function tabNav(string $target = '', ...$arguments): self;

    /**
     * @param string $id
     * @param bool $active
     *
     * @return self
     */
    public function tabNavItem(string $id, bool $active = false, ...$arguments): self;

    /**
     * @return self
     */
    public function tabContent(...$arguments): self;

    /**
     * @param string $id
     * @param bool $active
     *
     * @return self
     */
    public function tabContentItem(string $id, bool $active = false, ...$arguments): self;
}
