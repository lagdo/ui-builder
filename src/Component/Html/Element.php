<?php

/*
 * This file is part of the PhpHtmlBuilder package.
 *
 * (c) Andrew Polupanov <andrewfortalking@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lagdo\UiBuilder\Component\Html;

/**
 * Base class for implementing elements
 */
abstract class Element
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * Should implement element rendering
     *
     * @return string
     */
    abstract protected function render(): string;
}
