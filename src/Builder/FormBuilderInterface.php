<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\Base\CheckboxComponent;
use Lagdo\UiBuilder\Component\Base\FormComponent;
use Lagdo\UiBuilder\Component\Base\InputGroupComponent;
use Lagdo\UiBuilder\Component\Base\LabelComponent;
use Lagdo\UiBuilder\Component\Base\OptionComponent;
use Lagdo\UiBuilder\Component\Base\RadioComponent;

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
