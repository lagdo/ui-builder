<?php

namespace Lagdo\UiBuilder\Builder\Engine;

use Lagdo\HtmlBuilder\Builder\Engine as BaseEngine;
use Lagdo\HtmlBuilder\HtmlComponent;

class Engine extends BaseEngine
{
    /**
     * @var bool
     */
    private bool $inForm = false;

    /**
     * @param bool $inForm
     *
     * @return void
     */
    public function inForm(bool $inForm): void
    {
        $this->inForm = $inForm;
    }

    /**
     * @param array $arguments
     *
     * @return string
     */
    public function build(array $arguments): string
    {
        // The "root" component below will not be printed.
        $scope = new Scope(new HtmlComponent($this, 'root'), $this->inForm);
        $scope->build($arguments);
        return $scope->html();
    }
}
