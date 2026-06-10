<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

trait LayoutBuilderTrait
{
    /**
     * @var string
     */
    protected string $rowComponentClass = '';

    /**
     * @var string
     */
    protected string $colComponentClass = '';

    /**
     * @var string
     */
    protected string $alertComponentClass = '';

    /**
     * @var string
     */
    protected string $badgeComponentClass = '';

    /**
     * @inheritDoc
     */
    public function row(...$arguments): Component\GridRowComponent
    {
        return $this->createComponentOfClass($this->rowComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function col(...$arguments): Component\GridColComponent
    {
        return $this->createComponentOfClass($this->colComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function alert(...$arguments): Component\AlertComponent
    {
        return $this->createComponentOfClass($this->alertComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function badge(...$arguments): Component\BadgeComponent
    {
        return $this->createComponentOfClass($this->badgeComponentClass, $arguments);
    }
}
