<?php

namespace Lagdo\UiBuilder\Builder;

class Scope extends \Lagdo\UiBuilder\Html\Scope
{
    /**
     * @var bool
     */
    public $isInputGroup = false;

    /**
     * @var bool
     */
    public $isButtonGroup = false;

    /**
     * True if the scope was added to wrap another one, due to a framework requirement.
     *
     * @var bool
     */
    public $isWrapper = false;
}
