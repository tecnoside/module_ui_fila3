<?php

declare(strict_types=1);

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

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->themeComposer = new ThemeComposer();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->themeComposer);
    }

    public function testMetatags(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testMetatag(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testShowScripts(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
