<?php

namespace Lagdo\UiBuilder\Builder\Engine;

use Lagdo\UiBuilder\Html\Builder\Engine as BaseEngine;

class Engine extends BaseEngine
{
    /**
     * @var Scope|null
     */
    private Scope|null $scope = null;

    /**
     * @var bool
     */
    private bool $forceForm = false;

    /**
     * @param Scope $scope
     *
     * @return void
     */
    public function setScope(Scope $scope): void
    {
        $this->scope = $scope;
    }

    /**
     * @return void
     */
    public function unsetScope(): void
    {
        unset($this->scope);
        $this->scope = null;
    }

    /**
     * @param bool $forceForm
     *
     * @return void
     */
    public function forceForm(bool $forceForm): void
    {
        $this->forceForm = $forceForm;
    }

    /**
     * @return bool
     */
    public function inForm(): bool
    {
        return $this->forceForm || ($this->scope?->inForm() ?? false);
    }

    /**
     * @param array $arguments
     *
     * @return string
     */
    public function build(array $arguments): string
    {
        // The "root" component below will not be printed.
        $scope = new Scope($this->builder->createComponent('root'));
        $scope->build($arguments);

        return $scope->html();
    }
}
