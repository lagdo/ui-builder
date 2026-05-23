<?php

namespace Lagdo\UiBuilder\Component\Base;

use Lagdo\UiBuilder\Component\HtmlComponent;

abstract class TabsComponent extends HtmlComponent
{
    /**
     * @var string
     */
    public static string $tag = 'div';

    /**
     * @return static
     */
    public function vertical(): static
    {
        $this->properties['vertical'] = true;
        return $this;
    }

    /**
     * @param string $content
     *
     * @return static
     */
    public function content(string $content): static
    {
        $this->properties['content'] = $content;
        return $this;
    }
}
