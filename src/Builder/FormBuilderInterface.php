<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component;

interface FormBuilderInterface
{
    /**
     * @return Component\FormComponent
     */
    public function form(...$arguments): Component\FormComponent;

    /**
     * @return Component\LabelComponent
     */
    public function label(...$arguments): Component\LabelComponent;

    /**
     * @return Component\InputComponent
     */
    public function input(...$arguments): Component\InputComponent;

    /**
     * @return Component\TextareaComponent
     */
    public function textarea(...$arguments): Component\TextareaComponent;

    /**
     * @param bool $checked
     *
     * @return Component\CheckboxComponent
     */
    public function checkbox(...$arguments): Component\CheckboxComponent;

    /**
     * @param bool $checked
     *
     * @return Component\RadioComponent
     */
    public function radio(...$arguments): Component\RadioComponent;

    /**
     * @return Component\SelectComponent
     */
    public function select(...$arguments): Component\SelectComponent;

    /**
     * @param bool $selected
     *
     * @return Component\SelectOptionComponent
     */
    public function option(...$arguments): Component\SelectOptionComponent;

    /**
     * @return Component\InputGroupComponent
     */
    public function inputGroup(...$arguments): Component\InputGroupComponent;
}
