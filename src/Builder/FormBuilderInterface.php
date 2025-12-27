<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\CheckboxComponent;
use Lagdo\UiBuilder\Component\ColComponent;
use Lagdo\UiBuilder\Component\FormComponent;
use Lagdo\UiBuilder\Component\InputGroupComponent;
use Lagdo\UiBuilder\Component\OptionComponent;
use Lagdo\UiBuilder\Component\RadioComponent;
use Lagdo\UiBuilder\Component\RowComponent;

interface FormBuilderInterface
{
    /**
     * @return FormComponent
     */
    public function form(...$arguments): FormComponent;

    /**
     * @return RowComponent
     */
    public function formRow(...$arguments): RowComponent;

    /**
     * @return ColComponent
     */
    public function formCol(...$arguments): ColComponent;

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
