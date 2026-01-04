<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

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
    protected string $optionComponentClass = '';

    /**
     * @var string
     */
    protected string $inputGroupComponentClass = '';

    /**
     * @inheritDoc
     */
    public function form(...$arguments): Base\FormComponent
    {
        return $this->createComponentOfClass($this->formComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function label(...$arguments): Base\LabelComponent
    {
        return $this->createComponentOfClass($this->labelComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function input(...$arguments): Base\InputComponent
    {
        return $this->createComponentOfClass($this->inputComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function textarea(...$arguments): Base\TextareaComponent
    {
        return $this->createComponentOfClass($this->textareaComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function checkbox(...$arguments): Base\CheckboxComponent
    {
        return $this->createComponentOfClass($this->checkboxComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function radio(...$arguments): Base\RadioComponent
    {
        return $this->createComponentOfClass($this->radioComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function select(...$arguments): Base\SelectComponent
    {
        return $this->createComponentOfClass($this->selectComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function option(...$arguments): Base\OptionComponent
    {
        return $this->createComponentOfClass($this->optionComponentClass, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function inputGroup(...$arguments): Base\InputGroupComponent
    {
        return $this->createComponentOfClass($this->inputGroupComponentClass, $arguments);
    }
}
