<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\CheckboxComponent;
use Lagdo\UiBuilder\Component\FormComponent;
use Lagdo\UiBuilder\Component\InputGroupComponent;
use Lagdo\UiBuilder\Component\LabelComponent;
use Lagdo\UiBuilder\Component\OptionComponent;
use Lagdo\UiBuilder\Component\RadioComponent;

interface FormBuilderInterface
{
    /**
     * @return FormComponent
     */
    public function form(...$arguments): FormComponent;

    /**
     * @return LabelComponent
     */
    public function label(...$arguments): LabelComponent;

    /**
     * @param bool $checked
     *
     * @return CheckboxComponent
     */
    public function checkbox(...$arguments): CheckboxComponent;

    /**
     * @param bool $checked
     *
     * @return RadioComponent
     */
    public function radio(...$arguments): RadioComponent;

    /**
     * @param bool $selected
     *
     * @return OptionComponent
     */
    public function option(...$arguments): OptionComponent;

    /**
     * @return InputGroupComponent
     */
    public function inputGroup(...$arguments): InputGroupComponent;
}
