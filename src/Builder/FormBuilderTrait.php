<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\CheckboxComponent;
use Lagdo\UiBuilder\Component\FormComponent;
use Lagdo\UiBuilder\Component\InputGroupComponent;
use Lagdo\UiBuilder\Component\LabelComponent;
use Lagdo\UiBuilder\Component\OptionComponent;
use Lagdo\UiBuilder\Component\RadioComponent;
use Lagdo\UiBuilder\Component\Base\HtmlComponent;

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
    abstract protected function createFormElement(string $tagName, $arguments): HtmlComponent;

    /**
     * @inheritDoc
     */
    public function form(...$arguments): FormComponent
    {
        return $this->createElementOfClass($this->_formComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function label(...$arguments): LabelComponent
    {
        return $this->createElementOfClass($this->_labelComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function inputGroup(...$arguments): InputGroupComponent
    {
        return $this->createElementOfClass($this->_inputGroupComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function checkbox(...$arguments): CheckboxComponent
    {
        return $this->createElementOfClass($this->_checkboxComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function radio(...$arguments): RadioComponent
    {
        return $this->createElementOfClass($this->_radioComponentClass(), $arguments);
    }

    /**
     * @inheritDoc
     */
    public function option(...$arguments): OptionComponent
    {
        return $this->createElementOfClass($this->_optionComponentClass(), $arguments);
    }
}
