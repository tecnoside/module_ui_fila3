<?php

namespace Modules\UI\Tests\Unit\View\Components;

use Modules\UI\View\Components\Std;
use Tests\TestCase;

/**
 * Class StdTest.
 *
 * @covers \Modules\UI\View\Components\Std
 */
final class StdTest extends TestCase
{
    private Std $std;

    private string $tpl;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->tpl = '42';
        $this->std = new Std($this->tpl);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->std);
        unset($this->tpl);
    }

    public function testRender(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
