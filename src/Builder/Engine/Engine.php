<?php

namespace Lagdo\UiBuilder\Builder\Engine;

use Lagdo\UiBuilder\Html\Builder\Engine as BaseEngine;

class Engine extends BaseEngine
{
    /**
     * @var int
     */
    private int $formLevel = 0;

    /**
     * @return void
     */
    public function formStarted(): void
    {
        $this->formLevel++;
    }

    /**
     * @return void
     */
    public function formEnded(): void
    {
        $this->formLevel--;
    }

    /**
     * @return bool
     */
    public function inForm(): bool
    {
        return $this->formLevel > 0;
    }

    /**
     * @param array $arguments
     *
     * @return string
     */
    public function build(array $arguments): string
    {
        $this->formLevel = 0;
        // The "root" component below will not be printed.
        $scope = new Scope($this->builder->createComponent('root'));
        $scope->build($arguments);

        return $scope->html();
    }
}
