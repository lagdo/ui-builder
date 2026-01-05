<?php

namespace Lagdo\UiBuilder\Component\Base\Traits;

trait InputValidationTrait
{
    /**
     * @param bool $required
     *
     * @return static
     */
    public function required(bool $required = true): static
    {
        $this->element()->setAttribute('required', $required);
        return $this;
    }

    /**
     * @param bool $valid
     * @param string $message
     *
     * @return static
     */
    public function feedback(bool $valid, string $message = ''): static
    {
        return $this;
    }

    /**
     * @param bool $valid
     * @param string $message
     *
     * @return static
     */
    public function tooltip(bool $valid, string $message = ''): static
    {
        return $this;
    }
}
