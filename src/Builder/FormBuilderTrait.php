<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\CheckboxComponent;
use Lagdo\UiBuilder\Component\Base\FormComponent;
use Lagdo\UiBuilder\Component\Base\InputGroupComponent;
use Lagdo\UiBuilder\Component\Base\LabelComponent;
use Lagdo\UiBuilder\Component\Base\OptionComponent;
use Lagdo\UiBuilder\Component\Base\RadioComponent;
use Lagdo\UiBuilder\Component\HtmlComponent;

trait FormBuilderTrait
{
    /**
     * @var string
     */
    protected string $formComponentClass = '';

    /**
     * @var string
     */
    protected string $labelComponentClass = '';

    /**
     * @var string
     */
    protected string $inputGroupComponentClass = '';

    /**
     * @var string
     */
    protected string $checkboxComponentClass = '';

    /**
     * @var string
     */
    protected string $radioComponentClass = '';

    /**
     * @var string
     */
    protected string $optionComponentClass = '';

    /**
     * @param string $tagName
     * @param array $arguments
     *
     * @return HtmlComponent
     */
    abstract protected function createFormComponent(string $tagName, $arguments): HtmlComponent;

    /**
     * @inheritDoc
     */
    public function form(...$arguments): FormComponent
    {
        return $this->createComponentOfClass($this->formComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function label(...$arguments): LabelComponent
    {
        return $this->createComponentOfClass($this->labelComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function inputGroup(...$arguments): InputGroupComponent
    {
        return $this->createComponentOfClass($this->inputGroupComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function checkbox(...$arguments): CheckboxComponent
    {
        return $this->createComponentOfClass($this->checkboxComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function radio(...$arguments): RadioComponent
    {
        return $this->createComponentOfClass($this->radioComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function option(...$arguments): OptionComponent
    {
        return $this->createComponentOfClass($this->optionComponentClass, $arguments);
    }
}
