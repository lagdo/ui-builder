<?php

/*
 * This file is part of the PhpHtmlBuilder package.
 *
 * (c) Andrew Polupanov <andrewfortalking@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lagdo\UiBuilder\Builder\Html\Tag;

use function htmlspecialchars;

/**
 * Provides text block. Supports escaping.
 */
class Text extends AbstractTag
{
    /**
     * @param string $text
     * @param bool $isPlain
     */
    public function __construct(private string $text, private bool $isPlain = true)
    {}

    /**
     * @inheritDoc
     */
    protected function render(): string
    {
        return $this->isPlain ? htmlspecialchars($this->text, ENT_COMPAT) : (string)$this->text;
    }
}
