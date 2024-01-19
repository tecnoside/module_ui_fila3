<?php

namespace Modules\UI\Tests\Unit\View\Composers;

use Modules\UI\View\Composers\ThemeComposer;
use Tests\TestCase;

/**
 * Class ThemeComposerTest.
 *
 * @covers \Modules\UI\View\Composers\ThemeComposer
 */
final class ThemeComposerTest extends TestCase
{
    private ThemeComposer $themeComposer;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->themeComposer = new ThemeComposer();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->themeComposer);
    }

    public function testMetatags(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testMetatag(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testShowScripts(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
