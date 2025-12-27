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
use function sprintf;

/**
 * Provides html comment block
 */
class Comment extends AbstractTag
{
    /**
     * @param string $comment
     */
    public function __construct(private string $comment)
    {}

    /**
     * @inheritDoc
     */
    protected function render(): string
    {
        return sprintf('<!--%s-->', htmlspecialchars($this->comment, ENT_COMPAT));
    }
}
