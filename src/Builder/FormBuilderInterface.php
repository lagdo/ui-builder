<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\Component\CheckboxInterface;
use Lagdo\UiBuilder\Component\ColInterface;
use Lagdo\UiBuilder\Component\FormInterface;
use Lagdo\UiBuilder\Component\InputGroupInterface;
use Lagdo\UiBuilder\Component\OptionInterface;
use Lagdo\UiBuilder\Component\RadioInterface;
use Lagdo\UiBuilder\Component\RowInterface;

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
