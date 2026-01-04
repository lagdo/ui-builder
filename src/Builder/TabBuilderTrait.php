<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

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
    public function tabNav(...$arguments): Base\TabNavComponent
    {
        return $this->createComponentOfClass($this->tabNavComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabNavItem(...$arguments): Base\TabNavItemComponent
    {
        return $this->createComponentOfClass($this->tabNavItemComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabContent(...$arguments): Base\TabContentComponent
    {
        return $this->createComponentOfClass($this->tabContentComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabContentItem(...$arguments): Base\TabContentItemComponent
    {
        return $this->createComponentOfClass($this->tabContentItemComponentClass, $arguments);
    }
}
