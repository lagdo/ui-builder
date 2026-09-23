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

    public function __construct()
    {
        $this->engine = new Engine();

        $this->initBuilder();
    }

    /**
     * @return void
     */
    abstract protected function initBuilder(): void;

    /**
     * @template T of UiComponent
     * @psalm-param class-string<T> $class
     * @param array $arguments
     *
     * @return T
     */
    protected function createComponent(string $class, array $arguments = []): UiComponent
    {
        return new $class($this->engine, '', $arguments);
    }

    /**
     * @inheritDoc
     */
    public function inForm(Closure $builder): string
    {
        /** @var Engine */
        $engine = $this->engine;
        // Build the HTML code in a form.
        $engine->inForm(true);
        $html = $builder();
        $engine->inForm(false);

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
