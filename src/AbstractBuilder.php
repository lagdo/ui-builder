<?php

namespace Lagdo\UiBuilder;

use Lagdo\UiBuilder\Builder\Engine\Engine;
use Lagdo\UiBuilder\Component\Attr\DirectionGetter;
use Lagdo\UiBuilder\Component\Attr\JustifyGetter;
use Lagdo\UiBuilder\Component\Attr\LevelGetter;
use Lagdo\UiBuilder\Component\Attr\SizeGetter;
use Lagdo\UiBuilder\Component\Attr\VariantGetter;
use Lagdo\UiBuilder\Component\Attr\VisualGetter;
use Lagdo\UiBuilder\Html\HtmlBuilder;

/**
 * @extends HtmlBuilder<HtmlComponent>
 */
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
     * @var string
     */
    protected static string $componentClass = HtmlComponent::class;

    /**
     * @var LevelGetter
     */
    private $levelGetter;

    /**
     * @var VisualGetter
     */
    private $visualGetter;

    /**
     * @var SizeGetter
     */
    private $sizeGetter;

    /**
     * @var JustifyGetter
     */
    private $justifyGetter;

    /**
     * @var DirectionGetter
     */
    private $directionGetter;

    /**
     * @var VariantGetter
     */
    private $variantGetter;

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
