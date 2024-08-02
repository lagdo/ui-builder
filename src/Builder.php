<?php

namespace Lagdo\UiBuilder;

use Closure;
use Lagdo\UiBuilder\Html\UiBuilder;
use LogicException;
use RuntimeException;

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
     */
    public function __construct()
    {
        $this->builder = new UiBuilder();
        $this->builder->addTagBuilder('form', function(UiBuilder $builder,
            string $tagName, string $method, array $arguments) {
            $builder->createScope($tagName, $arguments);
            // Prepend the UI framework class to the tag.
            $builder->prependClass($this->_formTagClass($tagName));
        });
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return BuilderInterface
     * @throws LogicException When element is not initialized yet
     */
    public function __call(string $method, array $arguments)
    {
        $this->builder->make($method, $arguments);
        return $this;
    }

    /**
     * @param string $tagPrefix
     * @param Closure $tagBuilder
     *
     * @return void
     */
    public function addTagBuilder(string $tagPrefix, Closure $tagBuilder)
    {
        $this->builder->addTagBuilder($tagPrefix, $tagBuilder);
    }

    /**
     * @param string $name
     * @return BuilderInterface
     */
    public function tag(string $name, ...$arguments): BuilderInterface
    {
        $this->builder->createScope($name, $arguments);
        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return BuilderInterface
     */
    public function setAttribute(string $name, string $value): BuilderInterface
    {
        $this->builder->setAttribute($name, $value);
        return $this;
    }

    /**
     * @param array $attributes
     *
     * @return BuilderInterface
     */
    public function setAttributes(array $attributes): BuilderInterface
    {
        foreach ($attributes as $name => $value) {
            $this->builder->setAttribute($name, $value);
        }
        return $this;
    }

    /**
     * @param string $class
     *
     * @return BuilderInterface
     */
    public function setClass(string $class): BuilderInterface
    {
        // Don't overwrite the current class.
        $this->builder->appendClass($class);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addText(string $text): BuilderInterface
    {
        $this->builder->addText($text);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addHtml(string $html): BuilderInterface
    {
        $this->builder->addHtml($html);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addComment(string $comment): BuilderInterface
    {
        $this->builder->addComment($comment);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function checkbox(bool $checked = false, ...$arguments): BuilderInterface
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
    public function radio(bool $checked = false, ...$arguments): BuilderInterface
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
    public function option(bool $selected = false, ...$arguments): BuilderInterface
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
    public function formCol(int $width = 12, ...$arguments): BuilderInterface
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
     * @return BuilderInterface
     */
    public function clear(): BuilderInterface
    {
        $this->builder->clear();
        return $this;
    }

    /**
     * @return BuilderInterface
     */
    public function end(): BuilderInterface
    {
        $this->builder->end();
        return $this;
    }

    /**
     * @return BuilderInterface
     */
    public function endShorted(): BuilderInterface
    {
        $this->builder->endShorted();
        return $this;
    }

    /**
     * @inheritDoc
     * @throws RuntimeException When element is not initialized yet.
     */
    public function endOpened(): BuilderInterface
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
