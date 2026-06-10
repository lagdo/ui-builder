<?php

namespace Lagdo\UiBuilder\Component\Traits;

trait StateTrait
{
    /**
     * @var bool $active
     *
     * @return static
     */
    public function active(bool $active = true): static
    {
        $this->properties['active'] = $active;
        return $this;
    }

    /**
     * @var bool $inactive
     *
     * @return static
     */
    public function inactive(bool $inactive = true): static
    {
        $this->properties['active'] = !$inactive;
        return $this;
    }

    /**
     * @var bool $enabled
     *
     * @return static
     */
    public function enabled(bool $enabled = true): static
    {
        $this->properties['enabled'] = $enabled;
        return $this;
    }

    /**
     * @var bool $disabled
     *
     * @return static
     */
    public function disabled(bool $disabled = true): static
    {
        $this->element()->setAttribute('disabled', 'disabled');
        $this->properties['enabled'] = !$disabled;
        return $this;
    }
}
