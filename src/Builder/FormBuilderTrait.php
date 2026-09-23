<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

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
    protected string $inputComponentClass = '';

    /**
     * @var string
     */
    protected string $textareaComponentClass = '';

    /**
     * @var string
     */
    protected string $checkboxComponentClass = '';

    /**
     * @var string
     */
    protected string $checkboxGroupComponentClass = '';

    /**
     * @var string
     */
    protected string $radioComponentClass = '';

    /**
     * @var string
     */
    protected string $radioGroupComponentClass = '';

    /**
     * @var string
     */
    protected string $switchComponentClass = '';

    /**
     * @var string
     */
    protected string $selectComponentClass = '';

    /**
     * @var string
     */
    protected string $selectOptionComponentClass = '';

    /**
     * @var string
     */
    protected string $inputGroupComponentClass = '';

    /**
     * @inheritDoc
     */
    public function form(...$arguments): Component\FormComponent
    {
        return $this->createComponent($this->formComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function label(...$arguments): Component\LabelComponent
    {
        return $this->createComponent($this->labelComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function input(...$arguments): Component\InputComponent
    {
        return $this->createComponent($this->inputComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function textarea(...$arguments): Component\TextareaComponent
    {
        return $this->createComponent($this->textareaComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function checkbox(...$arguments): Component\CheckboxComponent
    {
        return $this->createComponent($this->checkboxComponentClass, $arguments);
    }

    /**
     * @return Component\CheckboxGroupComponent
     */
    public function checkboxGroup(...$arguments): Component\CheckboxGroupComponent
    {
        return $this->createComponent($this->checkboxGroupComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function switch(...$arguments): Component\SwitchComponent
    {
        return $this->createComponent($this->switchComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function radio(...$arguments): Component\RadioComponent
    {
        return $this->createComponent($this->radioComponentClass, $arguments);
    }

    /**
     * @return Component\RadioGroupComponent
     */
    public function radioGroup(...$arguments): Component\RadioGroupComponent
    {
        return $this->createComponent($this->radioGroupComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function select(...$arguments): Component\SelectComponent
    {
        return $this->createComponent($this->selectComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function option(...$arguments): Component\SelectOptionComponent
    {
        return $this->createComponent($this->selectOptionComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function inputGroup(...$arguments): Component\InputGroupComponent
    {
        return $this->createComponent($this->inputGroupComponentClass, $arguments);
    }
}
