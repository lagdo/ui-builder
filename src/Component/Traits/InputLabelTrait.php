<?php

namespace Lagdo\UiBuilder\Component\Traits;

use Lagdo\HtmlBuilder\Element\Html;
use Lagdo\HtmlBuilder\HtmlElement;
use Closure;

trait InputLabelTrait
{
    /**
     * @var HtmlElement|null
     */
    private HtmlElement|null $label = null;

    /**
     * @param Closure $builder
     *
     * @return static
     */
    abstract protected function beforeBuild(Closure $builder): static;

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return HtmlElement
     */
    abstract protected function newElement(string $name, array $arguments = []): HtmlElement;

    /**
     * @param HtmlElement $label
     * @param Html $html
     *
     * @return void
     */
    protected function setLabel(HtmlElement $label, Html $html)
    {}

    /**
     * @return void
     */
    private function setLabelFor(): void
    {
        // Set the "for" attribute on the label, if it was created.
        if ($this->label !== null && $this->element()->hasAttribute('id')) {
            $this->label->setAttribute('for', $this->element()->getAttribute('id'));
        }
    }

    /**
     * @param string $label
     * @param array $attributes
     *
     * @return static
     */
    public function label(string $label, array $attributes = []): static
    {
        $this->label = $this->newElement('label',  $attributes);
        $this->setLabel($this->label, new Html($label));
        $this->beforeBuild(fn() => $this->setLabelFor());
        return $this;
    }
}
