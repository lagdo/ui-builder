<?php

namespace Lagdo\UiBuilder;

use Closure;
use Lagdo\UiBuilder\Html\UiBuilder;

class BuilderSetup
{
    /**
     * @var UiBuilder
     */
    protected UiBuilder $builder;

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->builder = new UiBuilder();
    }

    /**
     * @return UiBuilder
     */
    public function getBuilder(): UiBuilder
    {
        return $this->builder;
    }

    /**
     * @param string $tagPrefix
     * @param Closure $tagBuilder
     *
     * @return void
     */
    public function addTagBuilder(string $tagPrefix, Closure $tagBuilder)
    {
        $this->builder->addTagBuilder($tagPrefix, $tagBuilder);
    }
}
