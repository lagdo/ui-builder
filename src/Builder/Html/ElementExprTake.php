<?php

namespace Lagdo\UiBuilder\Builder\Html;

use function is_callable;

class ElementExprTake extends ElementExpr
{
    /**
     * The constructor
     *
     * @param array $choices
     */
    public function __construct(array $choices)
    {
        foreach ($choices as [$condition, $element]) {
            if ($condition) {
                if (is_callable($element)) {
                    $element = $element();
                }
                if ($element !== null) {
                    $this->children[] = $element;
                }
                // The function ends once a condition is matched.
                return;
            }
        }
    }
}
