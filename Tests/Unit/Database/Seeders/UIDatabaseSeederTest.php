<?php

declare(strict_types=1);

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

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->uIDatabaseSeeder = new UIDatabaseSeeder();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->uIDatabaseSeeder);
    }

    public function testRun(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
