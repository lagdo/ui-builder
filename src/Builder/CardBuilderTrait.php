<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

trait CardBuilderTrait
{
    /**
     * @var string
     */
    protected string $cardComponentClass = '';

    /**
     * @var string
     */
    protected string $cardImageComponentClass = '';

    /**
     * @var string
     */
    protected string $cardHeaderComponentClass = '';

    /**
     * @var string
     */
    protected string $cardBodyComponentClass = '';

    /**
     * @var string
     */
    protected string $cardFooterComponentClass = '';

    /**
     * @inheritDoc
     */
    public function card(...$arguments): Base\CardComponent
    {
        return $this->createComponentOfClass($this->cardComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function cardImage(...$arguments): Base\CardImageComponent
    {
        return $this->createComponentOfClass($this->cardImageComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function cardHeader(...$arguments): Base\CardHeaderComponent
    {
        return $this->createComponentOfClass($this->cardHeaderComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function cardBody(...$arguments): Base\CardBodyComponent
    {
        return $this->createComponentOfClass($this->cardBodyComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function cardFooter(...$arguments): Base\CardFooterComponent
    {
        return $this->createComponentOfClass($this->cardFooterComponentClass, $arguments);
    }
}
