<?php

namespace Modules\UI\Tests\Unit\View\Components;

use Modules\UI\View\Components\Svg;
use Tests\TestCase;

/**
 * Class SvgTest.
 *
 * @covers \Modules\UI\View\Components\Svg
 */
final class SvgTest extends TestCase
{
    private Svg $svg;

    private string $tpl;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->tpl = '42';
        $this->svg = new Svg($this->tpl);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->svg);
        unset($this->tpl);
    }

    public function testRender(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
