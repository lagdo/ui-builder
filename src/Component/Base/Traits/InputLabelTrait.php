<?php

namespace Lagdo\UiBuilder\Component\Base\Traits;

use Lagdo\UiBuilder\Component\HtmlElement;
use Lagdo\UiBuilder\Component\Html\Html;

trait InputLabelTrait
{
    /**
     * @var HtmlElement|null
     */
    private HtmlElement|null $label = null;

    /**
     * @param string $label
     * @param array $attributes
     * @param bool $before
     *
     * @return static
     */
    public function label(string $label, array $attributes = [], bool $before = true): static
    {
        $this->label = $before ?
            $this->addSiblingPrev('label',  $attributes) :
            $this->addSiblingNext('label',  $attributes);
        $this->label->addBaseClass('form-label');
        $this->label->addChild(new Html($label));
        return $this;
    }

    /**
     * @return void
     */
    protected function setForLabelAttr(): void
    {
        // Set the "for" attribute on the label, if it was created.
        if ($this->label !== null && $this->element()->hasAttribute('id')) {
            $this->label->setAttribute('for', $this->element()->getAttribute('id'));
        }
    }
}
