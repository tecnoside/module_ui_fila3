<?php

namespace Modules\UI\Filament\Tests\Unit\Tables\Columns;

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

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->groupColumn = new GroupColumn();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->groupColumn);
    }

    public function testGetFields(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testSchema(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
