<?php

namespace Modules\UI\Tests\Unit\Filament\Blocks;

use Modules\UI\Filament\Blocks\Paragraph;
use Tests\TestCase;

/**
 * Class ParagraphTest.
 *
 * @covers \Modules\UI\Filament\Blocks\Paragraph
 */
final class ParagraphTest extends TestCase
{
    private Paragraph $paragraph;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->paragraph = new Paragraph();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->paragraph);
    }

    public function testMake(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
