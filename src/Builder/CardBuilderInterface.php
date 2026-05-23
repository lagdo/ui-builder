<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface CardBuilderInterface
{
    /**
     * @param string $style
     *
     * @return Base\CardComponent
     */
    public function card(...$arguments): Base\CardComponent;

    /**
     * @return Base\CardImageComponent
     */
    public function cardImage(...$arguments): Base\CardImageComponent;

    /**
     * @return Base\CardHeaderComponent
     */
    public function cardHeader(...$arguments): Base\CardHeaderComponent;

    /**
     * @return Base\CardBodyComponent
     */
    public function cardBody(...$arguments): Base\CardBodyComponent;

    /**
     * @return Base\CardFooterComponent
     */
    public function cardFooter(...$arguments): Base\CardFooterComponent;
}
