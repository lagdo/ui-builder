<?php

namespace Lagdo\UiBuilder\Builder\Html;

use Lagdo\UiBuilder\Component\Base\HtmlComponent;
use Lagdo\UiBuilder\Component\Virtual\VirtualComponent;
use Lagdo\UiBuilder\Html\HtmlElement;

use function is_a;
use function implode;

class Scope
{
    /**
     * @var array<HtmlElement|Content>
     */
    protected $contents = [];

    /**
     * @var array<HtmlComponent>
     */
    protected $children = [];

    /**
     * The constructor
     *
     * @param HtmlComponent $parent
     */
    public function __construct(protected HtmlComponent $parent)
    {}

    /**
     * Create the corresponding components
     *
     * @param mixed $component
     *
     * @return void
     */
    private function expand(mixed $component): void
    {
        if (is_a($component, HtmlElement::class) ||
            is_a($component, HtmlComponent::class)) {
            $this->children[] = $component;
            return;
        }

        if (is_a($component, VirtualComponent::class)) {
            // Recursively expand the children of the virtual components.
            foreach ($component->children as $childElement) {
                $this->expand($childElement);
            }
        }
    }

    /**
     * @param HtmlComponent $component
     * @param Scope $scope
     *
     * @return Content
     */
    private function createContent(HtmlComponent $component, Scope $scope): Content
    {
        $content = new Content($component, $scope->contents);
        foreach ($component->wrappers as $wrapper) {
            $content = new Content($wrapper, [$content]);
        }
        return $content;
    }

    /**
     * @param array $arguments The arguments passed to the component
     *
     * @return void
     */
    public function build(array $arguments): void
    {
        foreach ($arguments as $argument) {
            $this->expand($argument);
        }

        foreach ($this->children as $component) {
            if (is_a($component, HtmlElement::class)) {
                // A children of type HtmlElement doesn't need any further processing.
                $this->contents[] = $component;
                continue;
            }

            $component->onBuild($this->parent);

            // Recursively build the child scope.
            $scope = new Scope($component);
            $scope->build($component->children);

            // Generate the component content.
            $this->contents[] = $this->createContent($component, $scope);
        }
    }

    /**
     * @return string
     */
    public function html(): string
    {
        // Merge all the generated contents.
        return implode('', $this->contents);
    }
}
