<?php

namespace Lagdo\UiBuilder\Component\Traits;

use Lagdo\UiBuilder\Component\Attr\LevelEnum;

trait LevelTrait
{
    /**
     * @param LevelEnum $level
     *
     * @return static
     */
    public function level(LevelEnum $level): static
    {
        $this->properties['level'] = $level;
        return $this;
    }

    /**
     * @return static
     */
    public function success(): static
    {
        return $this->level(LevelEnum::SUCCESS);
    }

    /**
     * @return static
     */
    public function info(): static
    {
        return $this->level(LevelEnum::INFO);
    }

    /**
     * @return static
     */
    public function warning(): static
    {
        return $this->level(LevelEnum::WARNING);
    }

    /**
     * @return static
     */
    public function danger(): static
    {
        return $this->level(LevelEnum::DANGER);
    }
}
