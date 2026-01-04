<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base;

interface FormBuilderInterface
{
    /**
     * @return Base\FormComponent
     */
    public function form(...$arguments): Base\FormComponent;

    /**
     * @return Base\LabelComponent
     */
    public function label(...$arguments): Base\LabelComponent;

    /**
     * @return Base\InputComponent
     */
    public function input(...$arguments): Base\InputComponent;

    /**
     * @return Base\TextareaComponent
     */
    public function textarea(...$arguments): Base\TextareaComponent;

    /**
     * @param bool $checked
     *
     * @return Base\CheckboxComponent
     */
    public function checkbox(...$arguments): Base\CheckboxComponent;

    /**
     * @param bool $checked
     *
     * @return Base\RadioComponent
     */
    public function radio(...$arguments): Base\RadioComponent;

    /**
     * @return Base\SelectComponent
     */
    public function select(...$arguments): Base\SelectComponent;

    /**
     * @param bool $selected
     *
     * @return Base\OptionComponent
     */
    public function option(...$arguments): Base\OptionComponent;

    /**
     * @return Base\InputGroupComponent
     */
    public function inputGroup(...$arguments): Base\InputGroupComponent;
}
