<?php

namespace Lagdo\UiBuilder;

use Lagdo\HtmlBuilder\HtmlBuilder;
use Lagdo\UiBuilder\Builder\Engine\Engine;
use Lagdo\UiBuilder\Component\Attr\DirectionGetter;
use Lagdo\UiBuilder\Component\Attr\JustifyGetter;
use Lagdo\UiBuilder\Component\Attr\LevelGetter;
use Lagdo\UiBuilder\Component\Attr\SizeGetter;
use Lagdo\UiBuilder\Component\Attr\VariantGetter;
use Lagdo\UiBuilder\Component\Attr\VisualGetter;
use Closure;
use Override;

abstract class AbstractBuilder extends HtmlBuilder implements BuilderInterface
{
    use Builder\LayoutBuilderTrait;
    use Builder\ButtonBuilderTrait;
    use Builder\DropdownBuilderTrait;
    use Builder\CardBuilderTrait;
    use Builder\FormBuilderTrait;
    use Builder\MenuBuilderTrait;
    use Builder\TabBuilderTrait;
    use Builder\PaginationBuilderTrait;
    use Builder\TableBuilderTrait;

    /**
     * @var LevelGetter
     */
    private LevelGetter $levelGetter;

    /**
     * @var VisualGetter
     */
    private VisualGetter $visualGetter;

    /**
     * @var SizeGetter
     */
    private SizeGetter $sizeGetter;

    /**
     * @var JustifyGetter
     */
    private JustifyGetter $justifyGetter;

    /**
     * @var DirectionGetter
     */
    private DirectionGetter $directionGetter;

    /**
     * @var VariantGetter
     */
    private VariantGetter $variantGetter;

    /**
     * The constructor
     */
    public function __construct()
    {
        $this->engine = new Engine($this);

        $this->initBuilder();
    }

    /**
     * @return void
     */
    abstract protected function initBuilder(): void;

    /**
     * @inheritDoc
     */
    #[Override]
    public function tag(string $tagName, ...$arguments): HtmlComponent
    {
        // The HtmlComponent class is not the same as in the base class.
        return (new HtmlComponent($tagName, $arguments))->_e($this->engine);
    }

    /**
     * @param string $tagName
     * @param array $arguments
     *
     * @return HtmlComponent
     */
    public function createComponent(string $tagName, array $arguments = []): HtmlComponent
    {
        return (new HtmlComponent($tagName, $arguments))->_e($this->engine);
    }

    /**
     * @template T of HtmlComponent
     * @psalm-param class-string<T> $class
     * @param array $arguments
     *
     * @return T
     */
    protected function createComponentOfClass(string $class, array $arguments = []): HtmlComponent
    {
        return (new $class('', $arguments))->_e($this->engine);
    }

    /**
     * @inheritDoc
     */
    public function inForm(Closure $builder): string
    {
        /** @var Engine */
        $engine = $this->engine;
        // Build the HTML code in a form.
        $engine->forceForm(true);
        $html = $builder();
        $engine->forceForm(false);

        return $html;
    }

    /**
     * @inheritDoc
     */
    public function level(): LevelGetter
    {
        return $this->levelGetter ??= new LevelGetter();
    }

    /**
     * @inheritDoc
     */
    public function visual(): VisualGetter
    {
        return $this->visualGetter ??= new VisualGetter();
    }

    /**
     * @inheritDoc
     */
    public function size(): SizeGetter
    {
        return $this->sizeGetter ??= new SizeGetter();
    }

    /**
     * @inheritDoc
     */
    public function justify(): JustifyGetter
    {
        return $this->justifyGetter ??= new JustifyGetter();
    }

    /**
     * @inheritDoc
     */
    public function direction(): DirectionGetter
    {
        return $this->directionGetter ??= new DirectionGetter();
    }

    /**
     * @inheritDoc
     */
    public function variant(): VariantGetter
    {
        return $this->variantGetter ??= new VariantGetter();
    }

    /**
     * @return string
     */
    public function css(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function js(): string
    {
        return '';
    }
}
