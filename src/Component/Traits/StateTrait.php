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
        return $this->setProp('active', $active);
    }

    /**
     * @var bool $inactive
     *
     * @return static
     */
    public function inactive(bool $inactive = true): static
    {
        return $this->setProp('active', !$inactive);
    }

    /**
     * @var bool $enabled
     *
     * @return static
     */
    public function enabled(bool $enabled = true): static
    {
        return $this->setProp('enabled', $enabled);
    }

    /**
     * @var bool $disabled
     *
     * @return static
     */
    public function disabled(bool $disabled = true): static
    {
        $this->element()->setAttribute('disabled', 'disabled');
        return $this->setProp('enabled', !$disabled);
    }
}
