<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

interface CardBuilderInterface
{
    /**
     * @return Component\CardComponent
     */
    public function card(...$arguments): Component\CardComponent;

    /**
     * @return Component\CardImageComponent
     */
    public function cardImage(...$arguments): Component\CardImageComponent;

    /**
     * @return Component\CardHeaderComponent
     */
    public function cardHeader(...$arguments): Component\CardHeaderComponent;

    /**
     * @return Component\CardBodyComponent
     */
    public function cardBody(...$arguments): Component\CardBodyComponent;

    /**
     * @return Component\CardFooterComponent
     */
    public function cardFooter(...$arguments): Component\CardFooterComponent;
}
