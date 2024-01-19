<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\UI\Providers;

use Modules\UI\Providers\UIServiceProvider;
use Tests\TestCase;

/**
 * Class UIServiceProviderTest.
 *
 * @covers \Modules\UI\Providers\UIServiceProvider
 */
final class UIServiceProviderTest extends TestCase
{
    private UIServiceProvider $uIServiceProvider;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->uIServiceProvider = new UIServiceProvider();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->uIServiceProvider);
    }

    public function testBootCallback(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRegisterCallback(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
