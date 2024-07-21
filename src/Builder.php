<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Scope\UiBuilder;
use LogicException;

use function ltrim;
use function rtrim;

abstract class Builder implements BuilderInterface
{
    const BTN_PRIMARY = 1;
    const BTN_SECONDARY = 2;
    const BTN_SUCCESS = 4;
    const BTN_INFO = 8;
    const BTN_WARNING = 16;
    const BTN_DANGER = 32;
    const BTN_OUTLINE = 64;
    const BTN_FULL_WIDTH = 128;
    const BTN_LARGE = 256;
    const BTN_SMALL = 512;

    /**
     * @var UiBuilder
     */
    protected $builder;

    /**
     * The constructor
     * 
     * @param BuilderSetup $setup
     */
    public function __construct(protected BuilderSetup $setup)
    {
        $this->builder = $setup->getBuilder();
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return self
     * @throws LogicException When element is not initialized yet
     */
    public function __call(string $method, array $arguments)
    {
        $this->builder->make($method, $arguments);
        return $this;
    }

    /**
     * @param string $name
     * @return void
     */
    public function tag(string $name, ...$arguments)
    {
        $this->builder->createScope($name, $arguments);
        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    public function setAttribute(string $name, string $value)
    {
        $this->builder->setAttribute($name, $value);
        return $this;
    }

    /**
     * @param array $attributes
     *
     * @return self
     */
    public function setAttributes(array $attributes): self
    {
        foreach ($attributes as $name => $value) {
            $this->builder->setAttribute($name, $value);
        }
        return $this;
    }

    /**
     * @param string $class
     *
     * @return self
     */
    public function setClass(string $class): self
    {
        // Don't overwrite the current class.
        $this->builder->appendClass($class);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addText(string $text): self
    {
        $this->builder->addText($text);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addHtml(string $html): self
    {
        $this->builder->addHtml($html);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addComment(string $comment): self
    {
        $this->builder->addComment($comment);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function checkbox(bool $checked = false, ...$arguments): self
    {
        $this->builder->createScope('input', $arguments);
        $this->builder->setAttribute('type', 'checkbox');
        if ($checked) {
            $this->builder->setAttribute('checked', 'checked');
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function radio(bool $checked = false, ...$arguments): self
    {
        $this->builder->createScope('input', $arguments);
        $this->builder->setAttribute('type', 'radio');
        if ($checked) {
            $this->builder->setAttribute('checked', 'checked');
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function option(bool $selected = false, ...$arguments): self
    {
        $this->builder->createScope('option', $arguments);
        if ($selected) {
            $this->builder->setAttribute('selected', 'selected');
        }
        return $this;
    }

    /**
     * @param string $tagName
     *
     * @return string
     */
    protected abstract function _formTagClass(string $tagName): string;

    /**
     * @inheritDoc
     */
    public function formTagClass(string $tagName, string $class = ''): string
    {
        return rtrim($this->_formTagClass($tagName) . ' ' . ltrim($class));
    }

    /**
     * @inheritDoc
     */
    public function formCol(int $width = 12, ...$arguments): self
    {
        return $this->col($width, ...$arguments);
    }

    /**
     * @inheritDoc
     */
    public function formRowTag(): string
    {
        return 'div';
    }

    /**
     * @return self
     */
    public function end(): self
    {
        $this->builder->end();
        return $this;
    }

    /**
     * @return self
     */
    public function endShorted(): self
    {
        $this->builder->endShorted();
        return $this;
    }

    /**
     * @inheritDoc
     * @throws RuntimeException When element is not initialized yet.
     */
    public function endOpened(): self
    {
        $this->builder->endOpened();
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function build(): string
    {
        return $this->builder->build();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->build();
    }
}
