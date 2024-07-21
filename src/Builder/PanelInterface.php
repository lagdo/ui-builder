<?php

namespace Lagdo\UiBuilder\Builder;

interface PanelInterface
{
    /**
     * @param string $style
     *
     * @return self
     */
    public function panel(string $style = 'default', ...$arguments): self;

    /**
     * @return self
     */
    public function panelHeader(...$arguments): self;

    /**
     * @return self
     */
    public function panelBody(...$arguments): self;

    /**
     * @return self
     */
    public function panelFooter(...$arguments): self;
}
