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
    protected string $radioComponentClass = '';

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
        return $this->createComponentOfClass($this->formComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function label(...$arguments): Component\LabelComponent
    {
        return $this->createComponentOfClass($this->labelComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function input(...$arguments): Component\InputComponent
    {
        return $this->createComponentOfClass($this->inputComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function textarea(...$arguments): Component\TextareaComponent
    {
        return $this->createComponentOfClass($this->textareaComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function checkbox(...$arguments): Component\CheckboxComponent
    {
        return $this->createComponentOfClass($this->checkboxComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function radio(...$arguments): Component\RadioComponent
    {
        return $this->createComponentOfClass($this->radioComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function select(...$arguments): Component\SelectComponent
    {
        return $this->createComponentOfClass($this->selectComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function option(...$arguments): Component\SelectOptionComponent
    {
        return $this->createComponentOfClass($this->selectOptionComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function inputGroup(...$arguments): Component\InputGroupComponent
    {
        return $this->createComponentOfClass($this->inputGroupComponentClass, $arguments);
    }
}
