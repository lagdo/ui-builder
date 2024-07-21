<?php

/*
 * This file is part of the PhpHtmlBuilder package.
 *
 * (c) Andrew Polupanov <andrewfortalking@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lagdo\UiBuilder\Html;

use AvpLab\Element\Comment;
use AvpLab\Element\Element;
use AvpLab\Element\Text;
use AvpLab\Element\Tag;
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
    protected $elements = array();

    /**
     * @var Scope
     */
    protected $scope;

    /**
     * @param string $method
     * @param array $arguments
     * @return self
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
            return $this;
        }
        return $this->createScope($tagName, $arguments);
    }

    /**
     * @return self
     */
    public function clear(): self
    {
        $this->elements = [];
        $this->scope = null;
        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return self
     */
    protected function createScope(string $name, array $arguments = []): self
    {
        $this->scope = new Scope($name, $arguments, $this->scope);
        return $this;
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
     * @return self
     */
    public function tag(string $name, ...$arguments): self
    {
        $this->createScope($name, $arguments);
        return $this;
    }

    /**
     * @param string $text
     * @return self
     */
    public function addText(string $text): self
    {
        $this->addElementToScope(new Text($text));
        return $this;
    }

    /**
     * @param string $html
     * @return self
     */
    public function addHtml(string $html): self
    {
        $this->addElementToScope(new Text($html, false));
        return $this;
    }

    /**
     * @param string $comment
     * @return self
     */
    public function addComment($comment): self
    {
        $this->addElementToScope(new Comment($comment));
        return $this;
    }

    /**
     * @return self
     * @throws RuntimeException When element is not initialized yet.
     */
    public function end(): self
    {
        if ($this->scope === null) {
            throw new RuntimeException('Abnormal element completion');
        }
        $element = new Tag($this->scope->name, $this->scope->attributes, $this->scope->elements);
        $this->scope = $this->scope->parent;
        $this->addElementToScope($element);
        return $this;
    }

    /**
     * @return self
     * @throws RuntimeException When element is not initialized yet.
     */
    public function endShorted(): self
    {
        if ($this->scope === null) {
            throw new RuntimeException('Abnormal element completion');
        }
        $element = new Tag($this->scope->name, $this->scope->attributes);
        $element->setShort(true);
        $this->scope = $this->scope->parent;
        $this->addElementToScope($element);
        return $this;
    }

    /**
     * @return self
     * @throws RuntimeException When element is not initialized yet.
     */
    public function endOpened(): self
    {
        if ($this->scope === null) {
            throw new RuntimeException('Abnormal element completion');
        }
        $element = new Tag($this->scope->name, $this->scope->attributes);
        $element->setOpened(true);
        $this->scope = $this->scope->parent;
        $this->addElementToScope($element);
        return $this;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return implode('', $this->elements);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->build();
    }
}
