<?php

namespace Lagdo\UiBuilder\Builder\Html;

/**
 * Base class for expression base elements.
 */
abstract class ElementExpr extends AbstractElement
{
    /**
     * @var array
     */
    public array $children = [];
}
