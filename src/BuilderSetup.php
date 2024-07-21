<?php

namespace Lagdo\UiBuilder;

use Closure;

class BuilderSetup
{
    /**
     * @var array<string, Closure>
     */
    protected $tagBuilders;

    /**
     * @param string $tagPrefix
     * @param Closure $tagBuilder
     *
     * @return void
     */
    public function addTagBuilder(string $tagPrefix, Closure $tagBuilder)
    {
        // Do not overwrite existing builders.
        if(!isset($this->tagBuilders[$tagPrefix]))
        {
            $this->tagBuilders[$tagPrefix] = $tagBuilder;
        }
        return $this;
    }

    /**
     * @return array<string, Closure>
     */
    public function getTagBuilders(): array
    {
        return $this->tagBuilders;
    }
}
