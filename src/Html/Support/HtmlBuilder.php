<?php

/*
 * This file is part of the PhpHtmlBuilder package.
 *
 * (c) Andrew Polupanov <andrewfortalking@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lagdo\UiBuilder\Html\Support;

use AvpLab\Element\Comment;
use AvpLab\Element\Element;
use AvpLab\Element\Text;
use LogicException;
use RuntimeException;

use function strtolower;
use function preg_replace;
use function stripos;
use function substr;
use function implode;

/**
 * Provides API for easy building of HTML code in php
 */
class HtmlBuilder
{
    /**
     * @var Element[]
     */
    protected $elements = [];

    /**
     * @var Scope
     */
    protected $scope = null;

    /**
     * @param string $method
     * @param array $arguments
     * @return void
     * @throws LogicException When element is not initialized yet
     */
    public function __call(string $method, array $arguments)
    {
        $tagName = strtolower(preg_replace('/(?<!^)([A-Z])/', '-$1', $method));
        if (stripos($tagName, 'set-') === 0) {
            if ($this->scope === null) {
                throw new LogicException('Attributes can be set for elements only');
            }
            $this->scope->attributes[substr($tagName, 4)] = isset($arguments[0]) ? $arguments[0] : null;
            return;
        }
        $this->createScope($tagName, $arguments);
    }

    /**
     * @return void
     */
    public function clear()
    {
        $this->elements = [];
        $this->scope = null;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return void
     */
    protected function createScope(string $name, array $arguments = [])
    {
        $this->scope = new Scope($name, $arguments, $this->scope);
    }

    /**
     * @param Element $element
     * @return void
     */
    protected function addElementToScope(Element $element)
    {
        if ($this->scope === null) {
            $this->elements[] = $element;
            return;
        }
        $this->scope->elements[] = $element;
    }

    /**
     * @param string $name
     * @return void
     */
    public function tag(string $name, ...$arguments)
    {
        $this->createScope($name, $arguments);
    }

    /**
     * @param string $text
     * @return void
     */
    public function addText(string $text)
    {
        $this->addElementToScope(new Text($text));
    }

    /**
     * @param string $html
     * @return void
     */
    public function addHtml(string $html)
    {
        $this->addElementToScope(new Text($html, false));
    }

    /**
     * @param string $comment
     * @return void
     */
    public function addComment($comment)
    {
        $this->addElementToScope(new Comment($comment));
    }

    /**
     * @return void
     * @throws RuntimeException When element is not initialized yet.
     */
    public function end()
    {
        if ($this->scope === null) {
            throw new RuntimeException('Abnormal element completion');
        }
        $element = new Tag($this->scope->name, $this->scope, $this->scope->elements);
        $this->scope = $this->scope->parent;
        $this->addElementToScope($element);
    }

    /**
     * @return void
     * @throws RuntimeException When element is not initialized yet.
     */
    public function endShorted()
    {
        if ($this->scope === null) {
            throw new RuntimeException('Abnormal element completion');
        }
        $element = new Tag($this->scope->name, $this->scope);
        $element->setShort(true);
        $this->scope = $this->scope->parent;
        $this->addElementToScope($element);
    }

    /**
     * @return void
     * @throws RuntimeException When element is not initialized yet.
     */
    public function endOpened()
    {
        if ($this->scope === null) {
            throw new RuntimeException('Abnormal element completion');
        }
        $element = new Tag($this->scope->name, $this->scope);
        $element->setOpened(true);
        $this->scope = $this->scope->parent;
        $this->addElementToScope($element);
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return implode('', $this->elements);
    }
}
