<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Html\HtmlBuilder;
use LogicException;

use function trim;
use function strtolower;
use function preg_replace;
use function stripos;
use function substr;
use function array_shift;
use function func_get_args;

abstract class AbstractBuilder extends HtmlBuilder implements BuilderInterface
{
    const BTN_PRIMARY = 1;
    const BTN_SECONDARY = 2;
    const BTN_DANGER = 4;
    const BTN_FULL_WIDTH = 8;
    const BTN_OUTLINE = 16;
    const BTN_SMALL = 32;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param string $tagName
     *
     * @return string
     */
    protected abstract function getFormElementClass(string $tagName): string;

    /**
     * @param string $method
     * @param array $arguments
     * @return $this
     * @throws LogicException When element is not initialized yet
     */
    public function __call(string $method, array $arguments)
    {
        $tagName = strtolower(preg_replace('/(?<!^)([A-Z])/', '-$1', $method));
        if (stripos($tagName, 'set-') === 0) {
            if ($this->scope === null) {
                throw new LogicException('Attributes can be set for elements only');
            }
            $this->scope->attributes[substr($tagName, 4)] = $arguments[0] ?? null;
            return $this;
        }
        if (stripos($tagName, 'form-') === 0) {
            $tagName = substr($tagName, 5);
            $this->createScope($tagName, $arguments);
            // Prepend the UI framework class to the tag.
            $this->scope->attributes['class'] = trim($this->getFormElementClass($tagName) .
                ' ' . ($this->scope->attributes['class'] ?? ''));
            return $this;
        }
        return $this->createScope($tagName, $arguments);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return $this
     */
    protected function createScope(string $name, array $arguments)
    {
        $this->scope = new Scope($name, $arguments, $this->scope);
        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return $this
     */
    protected function createWrapper(string $name, array $arguments)
    {
        $this->scope = new Scope($name, [$arguments], $this->scope);
        $this->scope->isWrapper = true;
        return $this;
    }

    /**
     * Append a class to the existing one.
     *
     * @param string $class
     * @return void
     */
    protected function appendClass(string $class)
    {
        $this->scope->attributes['class'] = trim(($this->scope->attributes['class'] ?? ''). ' ' . $class);
    }

    /**
     * Prepend a class to the existing one.
     *
     * @param string $class
     * @return void
     */
    protected function prependClass(string $class)
    {
        $this->scope->attributes['class'] = trim($class . ' ' . ($this->scope->attributes['class'] ?? ''));
    }

    /**
     * @param array $attributes
     * @return void
     */
    protected function setAttributes(array $attributes)
    {
        foreach ($attributes as $name => $value) {
            $this->scope->attributes[$name] = $value;
        }
    }

    /**
     * @param string $class
     * @return $this
     */
    public function setClass(string $class): BuilderInterface
    {
        if ($this->scope === null) {
            throw new LogicException('Attributes can be set for elements only');
        }
        return $this->appendClass($class);
    }

    /**
     * @inheritDoc
     */
    public function checkbox(bool $checked = false): BuilderInterface
    {
        $arguments = func_get_args();
        array_shift($arguments);
        $this->tag('input', ...$arguments);
        $this->scope->attributes['type'] = 'checkbox';
        if ($checked) {
            $this->scope->attributes['checked'] = 'checked';
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function radio(bool $checked = false): BuilderInterface
    {
        $arguments = func_get_args();
        array_shift($arguments);
        $this->tag('input', ...$arguments);
        $this->scope->attributes['type'] = 'radio';
        if ($checked) {
            $this->scope->attributes['checked'] = 'checked';
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function option(bool $selected = false): BuilderInterface
    {
        $arguments = func_get_args();
        array_shift($arguments);
        $this->tag('option', ...$arguments);
        if ($selected) {
            $this->scope->attributes['selected'] = 'selected';
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function formCol(int $width = 12): BuilderInterface
    {
        $arguments = func_get_args();
        return $this->col(...$arguments);
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
    public function end(): BuilderInterface
    {
        parent::end();
        // Wrappers are scopes that were automatically added.
        // They also need to be automatically ended.
        while($this->scope !== null && $this->scope->isWrapper)
        {
            parent::end();
        }
        return $this;
    }

    /**
     * @return BuilderInterface
     */
    public function endShorted(): BuilderInterface
    {
        parent::endShorted();
        // Wrappers are scopes that were automatically added.
        // They also need to be automatically ended.
        while($this->scope !== null && $this->scope->isWrapper)
        {
            parent::end();
        }
        return $this;
    }
}
