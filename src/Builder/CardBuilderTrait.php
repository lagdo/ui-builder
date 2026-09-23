<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

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
    public function card(...$arguments): Component\CardComponent
    {
        return $this->createComponent($this->cardComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function cardImage(...$arguments): Component\CardImageComponent
    {
        return $this->createComponent($this->cardImageComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function cardHeader(...$arguments): Component\CardHeaderComponent
    {
        return $this->createComponent($this->cardHeaderComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function cardBody(...$arguments): Component\CardBodyComponent
    {
        return $this->createComponent($this->cardBodyComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function cardFooter(...$arguments): Component\CardFooterComponent
    {
        return $this->createComponent($this->cardFooterComponentClass, $arguments);
    }
}
