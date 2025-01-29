<?php

namespace Lagdo\UiBuilder\Html;

use Closure;
use LogicException;

use function preg_replace;
use function stripos;
use function strlen;
use function strtolower;
use function substr;
use function trim;

class UiBuilder extends Support\HtmlBuilder
{
    /**
     * @var array<string, Closure>
     */
    protected $tagBuilders = [];

    /**
     * @var Scope
     */
    protected $scope;

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->addTagBuilder('set', function(UiBuilder $builder,
            string $tagName, string $method, array $arguments) {
            if ($this->scope === null) {
                throw new LogicException('Attributes can be set for elements only');
            }
            $this->scope->attributes[$tagName] = $arguments[0] ?? null;
        });
    }

    /**
     * @return Scope|null
     */
    public function scope(): ?Scope
    {
        return $this->scope;
    }

    /**
     * @param string $tagPrefix
     * @param Closure $tagBuilder
     *
     * @return void
     */
    public function addTagBuilder(string $tagPrefix, Closure $tagBuilder)
    {
        // Do not overwrite existing builders.
        if(!isset($this->tagBuilders[$tagPrefix]))
        {
            $this->tagBuilders[$tagPrefix] = $tagBuilder;
        }
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return void
     * @throws LogicException When element is not initialized yet
     */
    public function make(string $method, array $arguments)
    {
        $tagName = strtolower(preg_replace('/(?<!^)([A-Z])/', '-$1', $method));
        foreach($this->tagBuilders as $tagPrefix => $tagBuilder)
        {
            if (stripos($tagName, $tagPrefix . '-') === 0) {
                $tagName = substr($tagName, strlen($tagPrefix) + 1);
                $tagBuilder($this, $tagName, $method, $arguments);
                return;
            }
        }
        $this->createScope($tagName, $arguments);
    }

    /**
     * @param string $name
     * @param string $value
     * @param bool $escape
     *
     * @return void
     */
    public function setAttribute(string $name, string $value, bool $escape = true)
    {
        $this->scope->attributes[$name] = $value;
        $this->scope->escapes[$name] = $escape;
    }

    /**
     * @param array $attributes
     * @param bool $escape
     *
     * @return self
     */
    public function setAttributes(array $attributes, bool $escape = true): self
    {
        foreach ($attributes as $name => $value) {
            $this->scope->attributes[$name] = $value;
            $this->scope->escapes[$name] = $escape;
        }
        return $this;
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return void
     */
    public function createScope(string $name, array $arguments = [])
    {
        $this->scope = new Scope($name, $arguments, $this->scope);
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return void
     */
    public function createWrapper(string $name, array $arguments = [])
    {
        $this->createScope($name, [$arguments]);
        $this->scope->isWrapper = true;
    }

    /**
     * Append a class to the existing one.
     *
     * @param string $class
     *
     * @return void
     */
    public function appendClass(string $class)
    {
        if ($this->scope === null) {
            throw new LogicException('Attributes can be set for elements only');
        }
        $class = ($this->scope->attributes['class'] ?? '') . ' ' . $class;
        $this->scope->attributes['class'] = trim($class);
    }

    /**
     * Prepend a class to the existing one.
     *
     * @param string $class
     *
     * @return void
     */
    public function prependClass(string $class)
    {
        if ($this->scope === null) {
            throw new LogicException('Attributes can be set for elements only');
        }
        $class .= ' ' . ($this->scope->attributes['class'] ?? '');
        $this->scope->attributes['class'] = trim($class);
    }

    /**
     * @return void
     */
    public function end()
    {
        parent::end();
        // Wrappers are scopes that were automatically added.
        // They also need to be automatically ended.
        while ($this->scope !== null && $this->scope->isWrapper) {
            parent::end();
        }
    }

    /**
     * @return void
     */
    public function endShorted()
    {
        parent::endShorted();
        // Wrappers are scopes that were automatically added.
        // They also need to be automatically ended.
        while ($this->scope !== null && $this->scope->isWrapper) {
            parent::end();
        }
    }

    /**
     * @return bool
     */
    public function isInputGroup(): bool
    {
        return $this->scope !== null && $this->scope->isInputGroup;
    }
}
