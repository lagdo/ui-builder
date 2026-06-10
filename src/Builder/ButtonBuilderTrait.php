<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

trait ButtonBuilderTrait
{
    /**
     * @var string
     */
    protected string $buttonComponentClass = '';

    /**
     * @var string
     */
    protected string $buttonGroupComponentClass = '';

    /**
     * @inheritDoc
     */
    public function button(...$arguments): Component\ButtonComponent
    {
        return $this->createComponentOfClass($this->buttonComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function buttonGroup(...$arguments): Component\ButtonGroupComponent
    {
        return $this->createComponentOfClass($this->buttonGroupComponentClass, $arguments);
    }
}
