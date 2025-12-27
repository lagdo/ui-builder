<?php

namespace Lagdo\UiBuilder\Builder\Html;

use Closure;

class ElementExprEach extends ElementExpr
{
    /**
     * The constructor
     *
     * @param array $items
     * @param Closure $closure
     */
    public function __construct(array $values, Closure $closure)
    {
        foreach ($values as $key => $value) {
            $this->children[] = $closure($value, $key);
        }
    }
}
