<?php

namespace Lagdo\UiBuilder\Component\Traits;

use Lagdo\UiBuilder\Html\Element\Text;
use Lagdo\UiBuilder\Html\HtmlElement;
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
    abstract protected function addBuilder(Closure $builder): static;

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return HtmlElement
     */
    abstract protected function newElement(string $name, array $arguments = []): HtmlElement;

    /**
     * @param HtmlElement $label
     * @param Text $text
     *
     * @return void
     */
    abstract protected function setLabel(HtmlElement $label, Text $text);

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
        $this->setLabel($this->label, new Text($label));
        $this->addBuilder($this->setLabelFor(...));
        return $this;
    }
}
