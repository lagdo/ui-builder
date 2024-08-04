<?php

namespace Lagdo\UiBuilder\Builder;

use Lagdo\UiBuilder\BuilderInterface;

interface ButtonInterface
{
    /**
     * @param bool $fullWidth
     *
     * @return BuilderInterface
     */
    public function buttonGroup(bool $fullWidth, ...$arguments): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function button(...$arguments): BuilderInterface;

    /**
     * @param string $icon
     *
     * @return BuilderInterface
     */
    public function addIcon(string $icon): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function addCaret(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function btnPrimary(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function btnSecondary(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function btnLarge(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function btnSmall(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function btnSuccess(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function btnInfo(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function btnWarning(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function btnDanger(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function btnOutline(): BuilderInterface;

    /**
     * @return BuilderInterface
     */
    public function btnFullWidth(): BuilderInterface;
}
