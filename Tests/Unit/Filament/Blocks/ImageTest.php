<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Filament\Blocks;

use Modules\UI\Filament\Blocks\Image;
use Tests\TestCase;

/**
 * Class ImageTest.
 *
 * @covers \Modules\UI\Filament\Blocks\Image
 */
final class ImageTest extends TestCase
{
    private Image $image;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
<<<<<<< HEAD
        $this->image = new Image();
=======
        $this->image = new Image;
>>>>>>> master
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->image);
    }

    public function testMake(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetRatios(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetRatioClass(): void
    {
        /* @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
