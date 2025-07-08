<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Element\CheckboxInterface;
use Lagdo\UiBuilder\Element\ColInterface;
use Lagdo\UiBuilder\Element\FormInterface;
use Lagdo\UiBuilder\Element\InputGroupInterface;
use Lagdo\UiBuilder\Element\OptionInterface;
use Lagdo\UiBuilder\Element\RadioInterface;
use Lagdo\UiBuilder\Element\RowInterface;

interface FormBuilderInterface
{
    /**
     * @return FormInterface
     */
    public function form(...$arguments): FormInterface;

    /**
     * @return RowInterface
     */
    public function formRow(...$arguments): RowInterface;

    /**
     * @return ColInterface
     */
    public function formCol(...$arguments): ColInterface;

    /**
     * @param bool $checked
     *
     * @return CheckboxInterface
     */
    public function checkbox(...$arguments): CheckboxInterface;

    /**
     * @param bool $checked
     *
     * @return RadioInterface
     */
    public function radio(...$arguments): RadioInterface;

    /**
     * @param bool $selected
     *
     * @return OptionInterface
     */
    public function option(...$arguments): OptionInterface;

    /**
     * @return InputGroupInterface
     */
    public function inputGroup(...$arguments): InputGroupInterface;
}
