<?php

namespace Modules\UI\Tests\Unit\Providers\Filament;

use Modules\UI\Providers\Filament\AdminPanelProvider;
use Tests\TestCase;

/**
 * Class AdminPanelProviderTest.
 *
 * @covers \Modules\UI\Providers\Filament\AdminPanelProvider
 */
final class AdminPanelProviderTest extends TestCase
{
    private AdminPanelProvider $adminPanelProvider;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->adminPanelProvider = new AdminPanelProvider();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->adminPanelProvider);
    }

    public function testPanel(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
