<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\TabNavComponent;
use Lagdo\UiBuilder\Component\Base\TabNavItemComponent;
use Lagdo\UiBuilder\Component\Base\TabContentComponent;
use Lagdo\UiBuilder\Component\Base\TabContentItemComponent;

trait TabBuilderTrait
{
    /**
     * @var string
     */
    protected string $tabNavComponentClass = '';

    /**
     * @var string
     */
    protected string $tabNavItemComponentClass = '';

    /**
     * @var string
     */
    protected string $tabContentComponentClass = '';

    /**
     * @var string
     */
    protected string $tabContentItemComponentClass = '';

    /**
     * @inheritDoc
     */
    public function tabNav(...$arguments): TabNavComponent
    {
        return $this->createComponentOfClass($this->tabNavComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabNavItem(...$arguments): TabNavItemComponent
    {
        return $this->createComponentOfClass($this->tabNavItemComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabContent(...$arguments): TabContentComponent
    {
        return $this->createComponentOfClass($this->tabContentComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabContentItem(...$arguments): TabContentItemComponent
    {
        return $this->createComponentOfClass($this->tabContentItemComponentClass, $arguments);
    }
}
