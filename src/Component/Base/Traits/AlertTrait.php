<?php

namespace Lagdo\UiBuilder\Component\Base\Traits;

use Lagdo\UiBuilder\Component\Attr\AlertEnum;

trait AlertTrait
{
    /**
     * @param AlertEnum $alert
     *
     * @return static
     */
    public function alert(AlertEnum $alert): static
    {
        $this->properties['alert'] = $alert;
        return $this;
    }

    /**
     * @return static
     */
    public function success(): static
    {
        return $this->alert(AlertEnum::SUCCESS);
    }

    /**
     * @return static
     */
    public function info(): static
    {
        return $this->alert(AlertEnum::INFO);
    }

    /**
     * @return static
     */
    public function warning(): static
    {
        return $this->alert(AlertEnum::WARNING);
    }

    /**
     * @return static
     */
    public function danger(): static
    {
        return $this->alert(AlertEnum::DANGER);
    }
}
