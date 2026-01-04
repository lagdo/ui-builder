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
