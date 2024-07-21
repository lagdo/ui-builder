<?php

namespace Lagdo\UiBuilder;

use Closure;
use Lagdo\UiBuilder\Html\HtmlBuilder;
use Lagdo\UiBuilder\Builder\Scope;
use LogicException;

use function array_merge;
use function trim;
use function ltrim;
use function rtrim;
use function strtolower;
use function preg_replace;
use function stripos;
use function substr;

abstract class AbstractBuilder extends HtmlBuilder implements BuilderInterface
{
    const BTN_PRIMARY = 1;
    const BTN_SECONDARY = 2;
    const BTN_DANGER = 4;
    const BTN_FULL_WIDTH = 8;
    const BTN_OUTLINE = 16;
    const BTN_SMALL = 32;

    /**
     * @var Scope
     */
    protected $scope;

    /**
     * @var array<string, Closure>
     */
    protected $tagBuilders;

    /**
     * @var array
     */
    protected $options = [];

    public function __construct(protected BuilderSetup $setup)
    {
        $this->tagBuilders = array_merge([
            'set' => function(BuilderInterface $builder, string $tagName, string $method, array $arguments) {
                if ($this->scope === null) {
                    throw new LogicException('Attributes can be set for elements only');
                }
                $this->scope->attributes[substr($tagName, 4)] = $arguments[0] ?? null;
            },
            'form' => function(BuilderInterface $builder, string $tagName, string $method, array $arguments) {
                $tagName = substr($tagName, 5);
                $this->createScope($tagName, $arguments);
                // Prepend the UI framework class to the tag.
                $this->prependClass($this->_formTagClass($tagName));
            },
        ], $setup->getTagBuilders());
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
        $tagName = strtolower(preg_replace('/(?<!^)([A-Z])/', '-$1', $method));
        foreach($this->tagBuilders as $tagPrefix => $tagBuilder)
        {
            if (stripos($tagName, $tagPrefix . '-') === 0) {
                $tagBuilder($this, $tagName, $method, $arguments);
                return $this;
            }
        }
        return $this->createScope($tagName, $arguments);
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return self
     */
    protected function createScope(string $name, array $arguments = []): self
    {
        $this->scope = new Scope($name, $arguments, $this->scope);
        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return self
     */
    protected function createWrapper(string $name, array $arguments = []): self
    {
        $this->createScope($name, [$arguments]);
        $this->scope->isWrapper = true;
        return $this;
    }

    /**
     * Append a class to the existing one.
     *
     * @param string $class
     *
     * @return self
     */
    protected function appendClass(string $class): self
    {
        $class = ($this->scope->attributes['class'] ?? '') . ' ' . $class;
        $this->scope->attributes['class'] = trim($class);
        return $this;
    }

    /**
     * Prepend a class to the existing one.
     *
     * @param string $class
     *
     * @return self
     */
    protected function prependClass(string $class): self
    {
        $class .= ' ' . ($this->scope->attributes['class'] ?? '');
        $this->scope->attributes['class'] = trim($class);
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
            $this->scope->attributes[$name] = $value;
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
        if ($this->scope === null) {
            throw new LogicException('Attributes can be set for elements only');
        }
        // Don't overwrite the current class.
        return $this->appendClass($class);
    }

    /**
     * @inheritDoc
     */
    public function checkbox(bool $checked = false, ...$arguments): self
    {
        $this->createScope('input', $arguments);
        $this->scope->attributes['type'] = 'checkbox';
        if ($checked) {
            $this->scope->attributes['checked'] = 'checked';
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function radio(bool $checked = false, ...$arguments): self
    {
        $this->createScope('input', $arguments);
        $this->scope->attributes['type'] = 'radio';
        if ($checked) {
            $this->scope->attributes['checked'] = 'checked';
        }
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function option(bool $selected = false, ...$arguments): self
    {
        $this->createScope('option', $arguments);
        if ($selected) {
            $this->scope->attributes['selected'] = 'selected';
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
        parent::end();
        // Wrappers are scopes that were automatically added.
        // They also need to be automatically ended.
        while ($this->scope !== null && $this->scope->isWrapper) {
            parent::end();
        }
        return $this;
    }

    /**
     * @return self
     */
    public function endShorted(): self
    {
        parent::endShorted();
        // Wrappers are scopes that were automatically added.
        // They also need to be automatically ended.
        while ($this->scope !== null && $this->scope->isWrapper) {
            parent::end();
        }
        return $this;
    }
}
