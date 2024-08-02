<?php

namespace Lagdo\UiBuilder\Html\Support;

use AvpLab\Element\Element;

class Tag extends Element
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Scope
     */
    private $scope;

    /**
     * @var bool
     */
    private $isShort = false;

    /**
     * @var bool
     */
    private $isOpened = false;

    /**
     * @var Element[]
     */
    private $children = [];

    /**
     * @param string $name
     * @param Scope $scope
     * @param Element[] $children
     */
    public function __construct($name, Scope $scope, array $children = [])
    {
        $this->name = $name;
        $this->scope = $scope;
        $this->setChildren($children);
    }

    /**
     * @param Element[] $children
     */
    public function setChildren(array $children)
    {
        $this->children = array_merge($this->children, $children);
    }

    /**
     * @param bool $isShort
     */
    public function setShort($isShort)
    {
        $this->isShort = $isShort;
    }

    /**
     * @param bool $isOpened
     */
    public function setOpened($isOpened)
    {
        $this->isOpened = $isOpened;
    }

    /**
     * [@inheritdoc}
     */
    protected function render()
    {
        return match(true) {
            $this->isShort => $this->renderShort(),
            $this->isOpened => $this->renderOpened(),
            default => $this->renderTag(),
        };
    }

    /**
     * @return string
     */
    private function renderAttributes()
    {
        if (!$this->scope->attributes) {
            return '';
        }

        $attributes = [];
        foreach ($this->scope->attributes as $name => $value) {
            if (is_numeric($name)) {
                $attributes[] = $this->escape($value);
                continue;
            }
            if (($this->scope->escapes[$name] ?? true) === true) {
                $value = $this->escape($value);
            }
            $attributes[] = sprintf('%s="%s"', $this->escape($name), $value);
        }
        return ' ' . implode(' ', $attributes);
    }

    /**
     * @return string
     */
    private function renderShort()
    {
        return sprintf('<%s%s />', $this->name, $this->renderAttributes());
    }

    /**
     * @return string
     */
    private function renderOpened()
    {
        return sprintf('<%s%s>', $this->name, $this->renderAttributes());
    }

    /**
     * @return string
     */
    private function renderTag()
    {
        $children = '';
        foreach ($this->children as $child) {
            $children .= $child;
        }
        return sprintf('%s%s</%s>', $this->renderOpened(), $children, $this->name);
    }

    /**
     * Helper for escaping
     *
     * @param $value
     * @return string
     */
    private function escape($value)
    {
        return htmlspecialchars($value, ENT_COMPAT);
    }
}
