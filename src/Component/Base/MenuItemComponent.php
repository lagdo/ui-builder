<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class MenuItemComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = 'li';

    /**
     * @var string
     */
    protected static string $activeClass = 'active';

    /**
     * @var string
     */
    protected static string $disabledClass = 'disabled';

    /**
     * @param bool $active
     *
     * @return static
     */
    public function active(bool $active): static
    {
        $this->element()->removeClass(static::$activeClass);
        if ($active) {
            $this->element()->addClass(static::$activeClass);
        }
        return $this;
    }

    /**
     * @param bool $disabled
     *
     * @return static
     */
    public function disabled(bool $disabled): static
    {
        $this->element()->removeClass(static::$disabledClass);
        if ($disabled) {
            $this->element()->addClass(static::$disabledClass);
        }
        return $this;
    }
}
