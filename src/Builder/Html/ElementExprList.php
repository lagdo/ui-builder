<?php

namespace Lagdo\UiBuilder\Builder\Html;

class ElementExprList extends ElementExpr
{
    /**
     * The constructor
     *
     * @param array $children
     */
    public function __construct(array $children)
    {
        $this->children = $children;
    }
}
