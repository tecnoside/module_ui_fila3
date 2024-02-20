<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Filament\Blocks;

use Modules\UI\Filament\Blocks\Title;
use Tests\TestCase;

/**
 * Class TitleTest.
 *
 * @covers \Modules\UI\Filament\Blocks\Title
 */
final class TitleTest extends TestCase
{
    private Title $title;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->title = new Title();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->title);
    }

    public function testMake(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
