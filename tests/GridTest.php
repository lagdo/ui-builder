<?php

namespace Lagdo\UiBuilder\Tests;

use PHPUnit\Framework\TestCase;

final class GridTest extends TestCase
{
    /**
     * @var Builder
     */
    protected $ui;

    protected function setUp(): void
    {
        $this->ui = new Builder();
    }

    public function testGrid()
    {
        $html = $this->ui->build(
            $this->ui->div(
                $this->ui->row(
                    $this->ui->col()->unit(1, 3),
                    $this->ui->col()->unit(2, 3)
                )
            )
        );
        $this->assertEquals('<div><div class="pure-g"><div class="pure-u-1-3"></div><div class="pure-u-2-3"></div></div></div>', $html);
    }
}
