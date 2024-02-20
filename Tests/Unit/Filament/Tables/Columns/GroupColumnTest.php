<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Filament\Tables\Columns;

use Modules\UI\Filament\Tables\Columns\GroupColumn;
use Tests\TestCase;

/**
 * Class GroupColumnTest.
 *
 * @covers \Modules\UI\Filament\Tables\Columns\GroupColumn
 */
final class GroupColumnTest extends TestCase
{
    private GroupColumn $groupColumn;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
<<<<<<< HEAD
        $this->groupColumn = new GroupColumn();
=======
        $this->groupColumn = new GroupColumn;
>>>>>>> master
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->groupColumn);
    }

    public function testGetFields(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testSchema(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
