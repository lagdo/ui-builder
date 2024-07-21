<?php

namespace Lagdo\UiBuilder\Builder;

interface TabInterface
{
    /**
     * @param string $target The id of the tab content element
     *
     * @return self
     */
    public function tabNav(string $target = ''): self;

    /**
     * @param string $id
     * @param bool $active
     *
     * @return self
     */
    public function tabNavItem(string $id, bool $active = false): self;

    /**
     * @return self
     */
    public function tabContent(): self;

    /**
     * @param string $id
     * @param bool $active
     *
     * @return self
     */
    public function tabContentItem(string $id, bool $active = false): self;
}
