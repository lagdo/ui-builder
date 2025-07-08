<?php

namespace Lagdo\UiBuilder\Builder\Html;

use Closure;

use function is_callable;

class ElementExprWhen extends ElementExprList
{
    /**
     * The constructor
     *
     * @param bool $condition
     * @param Closure|AbstractElement $element
     */
    public function __construct(bool $condition, Closure|AbstractElement $element)
    {
        if (!$condition) {
            return;
        }
        if (is_callable($element)) {
            $element = $element();
        }
        if ($element !== null) {
            $this->children[] = $element;
        }
    }
}
