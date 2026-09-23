<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

trait TabBuilderTrait
{
    /**
     * @var string
     */
    protected string $tabsComponentClass = '';

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
    public function tabs(...$arguments): Component\TabsComponent
    {
        return $this->createComponent($this->tabsComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabNav(...$arguments): Component\TabNavComponent
    {
        return $this->createComponent($this->tabNavComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabNavItem(...$arguments): Component\TabNavItemComponent
    {
        return $this->createComponent($this->tabNavItemComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabContent(...$arguments): Component\TabContentComponent
    {
        return $this->createComponent($this->tabContentComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function tabContentItem(...$arguments): Component\TabContentItemComponent
    {
        return $this->createComponent($this->tabContentItemComponentClass, $arguments);
    }
}
