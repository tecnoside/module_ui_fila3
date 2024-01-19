<?php

declare(strict_types=1);

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

    protected function setUp(): void
    {
        parent::setUp();

        $this->tpl = '42';
        $this->std = new Std($this->tpl);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->std, $this->tpl);
    }

    public function testRender(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
