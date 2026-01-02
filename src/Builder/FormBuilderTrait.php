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
     * @return string
     */
    abstract protected function _formComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _labelComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _inputGroupComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _checkboxComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _radioComponentClass(): string;

    /**
     * @return string
     */
    abstract protected function _optionComponentClass(): string;

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
        return $this->createComponentOfClass($this->_formComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function label(...$arguments): LabelComponent
    {
        return $this->createComponentOfClass($this->_labelComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function inputGroup(...$arguments): InputGroupComponent
    {
        return $this->createComponentOfClass($this->_inputGroupComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function checkbox(...$arguments): CheckboxComponent
    {
        return $this->createComponentOfClass($this->_checkboxComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function radio(...$arguments): RadioComponent
    {
        return $this->createComponentOfClass($this->_radioComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function option(...$arguments): OptionComponent
    {
        return $this->createComponentOfClass($this->_optionComponentClass(), $arguments);
    }
}
