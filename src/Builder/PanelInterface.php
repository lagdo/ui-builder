<?php

namespace Lagdo\UiBuilder\Builder;

interface PanelInterface
{
    /**
     * @param string $style
     *
     * @return self
     */
    public function panel(string $style = 'default'): self;

    /**
     * @return self
     */
    public function panelHeader(): self;

    /**
     * @return self
     */
    public function panelBody(): self;

    /**
     * @return self
     */
    public function panelFooter(): self;
}
