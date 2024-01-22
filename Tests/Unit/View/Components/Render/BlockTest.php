<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\View\Components\Render;

use Illuminate\Database\Eloquent\Model;
use Mockery\Mock;
use Modules\UI\View\Components\Render\Block;
use Tests\TestCase;

/**
 * Class BlockTest.
 *
 * @covers \Modules\UI\View\Components\Render\Block
 */
final class BlockTest extends TestCase
{
    private Block $block;

    private array $block;

    private Model|Mock $model;

    private string $tpl;

    protected function setUp(): void
    {
        parent::setUp();

        $this->block = [];
        $this->model = \Mockery::mock(Model::class);
        $this->tpl = '42';
        $this->block = new Block($this->block, $this->model, $this->tpl);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->block, $this->block, $this->model, $this->tpl);
    }

    public function testRender(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
