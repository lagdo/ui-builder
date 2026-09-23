<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

trait LayoutBuilderTrait
{
    /**
     * @var string
     */
    protected string $rowComponentClass = Component\GridRowComponent::class;

    /**
     * @var string
     */
    protected string $colComponentClass = Component\GridColComponent::class;

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
        return $this->createComponent($this->rowComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function col(...$arguments): Component\GridColComponent
    {
        return $this->createComponent($this->colComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function alert(...$arguments): Component\AlertComponent
    {
        return $this->createComponent($this->alertComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function badge(...$arguments): Component\BadgeComponent
    {
        return $this->createComponent($this->badgeComponentClass, $arguments);
    }
}
