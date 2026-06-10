<?php

namespace Lagdo\UiBuilder\Component;

use Lagdo\UiBuilder\HtmlComponent;

abstract class FormComponent extends HtmlComponent
{
    /**
     * @var string
     */
    protected string $tagName = 'form';

    /**
     * @param string $tagName
     * @param array $arguments
     */
    public function __construct(string $tagName, array $arguments = [])
    {
        parent::__construct($tagName, $arguments);

        $this->addBuilder(fn() => $this->engine()->formStarted(), 'before');
        $this->addBuilder(fn() => $this->engine()->formEnded(), 'after');
    }

    /**
     * @return static
     */
    public function validated(): static
    {
        return $this;
    }

    /**
     * @return static
     */
    public function wrapped(): static
    {
        return $this;
    }
}
