<?php

namespace Modules\UI\Tests\Unit\Database\Seeders;

use Modules\UI\Database\Seeders\UIDatabaseSeeder;
use Tests\TestCase;

/**
 * Class UIDatabaseSeederTest.
 *
 * @covers \Modules\UI\Database\Seeders\UIDatabaseSeeder
 */
final class UIDatabaseSeederTest extends TestCase
{
    private UIDatabaseSeeder $uIDatabaseSeeder;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->uIDatabaseSeeder = new UIDatabaseSeeder();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->uIDatabaseSeeder);
    }

    public function testRun(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
