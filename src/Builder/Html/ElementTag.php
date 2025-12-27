<?php

namespace Lagdo\UiBuilder\Builder\Html;

use Lagdo\UiBuilder\Builder\Html\Tag\AbstractTag;

use function array_merge;
use function htmlspecialchars;
use function implode;
use function is_numeric;
use function sprintf;

class ElementTag extends AbstractTag
{
    /**
     * @var Element
     */
    private $element;

    /**
     * @var bool
     */
    private $isShort = false;

    /**
     * @var bool
     */
    private $isOpened = false;

    /**
     * @var AbstractTag[]
     */
    private $children = [];

    /**
     * @param Element $element
     * @param AbstractTag[] $children
     */
    public function __construct(Element $element, array $children = [])
    {
        $this->element = $element;
        $this->setChildren($children);
    }

    /**
     * @param AbstractTag[] $children
     */
    public function setChildren(array $children): void
    {
        $this->children = array_merge($this->children, $children);
    }

    /**
     * @param bool $isShort
     */
    public function setShort($isShort): void
    {
        $this->isShort = $isShort;
    }

    /**
     * @param bool $isOpened
     */
    public function setOpened($isOpened): void
    {
        $this->isOpened = $isOpened;
    }

    /**
     * @inheritDoc
     */
    protected function render(): string
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
    private function renderAttributes(): string
    {
        // Merge the classes.
        $classes = $this->element->classes;
        $classes[0] = trim(implode(' ', $classes[0]));
        if (isset($this->element->attributes['class'])) {
            $classes[] = $this->element->attributes['class'];
        }
        if (($class = trim(implode(' ', $classes))) !== '') {
            $this->element->attributes['class'] = $class;
        }

        $attributes = [];
        foreach ($this->element->attributes as $name => $value) {
            if (is_numeric($name)) {
                $attributes[] = $this->escape($value);
                continue;
            }

            if (($this->element->escapes[$name] ?? true) === true) {
                $value = $this->escape($value);
            }
            $attributes[] = sprintf('%s="%s"', $this->escape($name), $value);
        }
        return !$attributes ? '' : ' ' . implode(' ', $attributes);
    }

    /**
     * @return string
     */
    private function renderShort(): string
    {
        return sprintf('<%s%s />', $this->element->name, $this->renderAttributes());
    }

    /**
     * @return string
     */
    private function renderOpened(): string
    {
        return sprintf('<%s%s>', $this->element->name, $this->renderAttributes());
    }

    /**
     * @return string
     */
    private function renderTag(): string
    {
        $children = '';
        foreach ($this->children as $child) {
            $children .= $child;
        }
        return sprintf('%s%s</%s>', $this->renderOpened(),
            $children, $this->element->name);
    }

    /**
     * @param $value
     *
     * @return string
     */
    private function escape($value): string
    {
        return htmlspecialchars($value, ENT_COMPAT);
    }
}
