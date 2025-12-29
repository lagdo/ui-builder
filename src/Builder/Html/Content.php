<?php

namespace Lagdo\UiBuilder\Builder\Html;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Html\HtmlElement;

use function array_merge;
use function htmlspecialchars;
use function implode;
use function is_numeric;
use function sprintf;

/**
 * The HTML tags finally generated for a given component
 */
class Content extends HtmlElement
{
    /**
     * @var bool
     */
    private $isShort = false;

    /**
     * @var bool
     */
    private $isOpened = false;

    /**
     * @param HtmlComponent $component
     * @param HtmlElement[] $children
     */
    public function __construct(private HtmlComponent $component, private array $children = [])
    {}

    /**
     * @param HtmlElement[] $children
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
        $classes = $this->component->classes;
        $classes[0] = trim(implode(' ', $classes[0]));
        if (isset($this->component->attributes['class'])) {
            $classes[] = $this->component->attributes['class'];
        }
        if (($class = trim(implode(' ', $classes))) !== '') {
            $this->component->attributes['class'] = $class;
        }

        $attributes = [];
        foreach ($this->component->attributes as $name => $value) {
            if (is_numeric($name)) {
                $attributes[] = $this->escape($value);
                continue;
            }

            if (($this->component->escapes[$name] ?? true) === true) {
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
        return sprintf('<%s%s />', $this->component->name, $this->renderAttributes());
    }

    /**
     * @return string
     */
    private function renderOpened(): string
    {
        return sprintf('<%s%s>', $this->component->name, $this->renderAttributes());
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
        return sprintf('%s%s</%s>', $this->renderOpened(), $children, $this->component->name);
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
