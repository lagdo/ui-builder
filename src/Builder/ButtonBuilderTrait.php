<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\BadgeComponent;
use Lagdo\UiBuilder\Component\Base\ButtonComponent;
use Lagdo\UiBuilder\Component\Base\ButtonGroupComponent;

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
    public function buttonGroup(...$arguments): ButtonGroupComponent
    {
        return $this->createComponentOfClass($this->buttonGroupComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function button(...$arguments): ButtonComponent
    {
        return $this->createComponentOfClass($this->buttonComponentClass, $arguments);
    }

    /**
     * @return BadgeComponent
     */
    public function badge(...$arguments): BadgeComponent
    {
        return $this->createComponentOfClass($this->badgeComponentClass, $arguments);
    }
}
