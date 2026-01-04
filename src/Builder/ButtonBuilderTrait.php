<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

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
     * @var string
     */
    protected string $badgeComponentClass = '';

    /**
     * @inheritDoc
     */
    public function buttonGroup(...$arguments): Base\ButtonGroupComponent
    {
        return $this->createComponentOfClass($this->buttonGroupComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function button(...$arguments): Base\ButtonComponent
    {
        return $this->createComponentOfClass($this->buttonComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function badge(...$arguments): Base\BadgeComponent
    {
        return $this->createComponentOfClass($this->badgeComponentClass, $arguments);
    }
}
