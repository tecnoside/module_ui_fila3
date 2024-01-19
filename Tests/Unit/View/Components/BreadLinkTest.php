<?php

namespace Modules\UI\Tests\Unit\View\Components;

use Modules\UI\View\Components\BreadLink;
use Tests\TestCase;

/**
 * Class BreadLinkTest.
 *
 * @covers \Modules\UI\View\Components\BreadLink
 */
final class BreadLinkTest extends TestCase
{
    private BreadLink $breadLink;

    private string $tpl;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->tpl = '42';
        $this->breadLink = new BreadLink($this->tpl);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->breadLink);
        unset($this->tpl);
    }

    public function testRender(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
