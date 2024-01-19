<?php

namespace Modules\UI\View\Tests\Unit\Components\Render;

use Illuminate\Database\Eloquent\Model;
use Mockery;
use Mockery\Mock;
use Modules\UI\View\Components\Render\Blocks;
use Tests\TestCase;

/**
 * Class BlocksTest.
 *
 * @covers \Modules\UI\View\Components\Render\Blocks
 */
final class BlocksTest extends TestCase
{
    private Blocks $blocks;

    private array $blocks;

    private Model|Mock $model;

    private string $tpl;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->blocks = [];
        $this->model = Mockery::mock(Model::class);
        $this->tpl = '42';
        $this->blocks = new Blocks($this->blocks, $this->model, $this->tpl);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->blocks);
        unset($this->blocks);
        unset($this->model);
        unset($this->tpl);
    }

    public function testRender(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
