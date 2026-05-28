<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

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
    public function row(...$arguments): Base\GridRowComponent
    {
        return $this->createComponentOfClass($this->rowComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function col(...$arguments): Base\GridColComponent
    {
        return $this->createComponentOfClass($this->colComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function alert(...$arguments): Base\AlertComponent
    {
        return $this->createComponentOfClass($this->alertComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function badge(...$arguments): Base\BadgeComponent
    {
        return $this->createComponentOfClass($this->badgeComponentClass, $arguments);
    }
}
