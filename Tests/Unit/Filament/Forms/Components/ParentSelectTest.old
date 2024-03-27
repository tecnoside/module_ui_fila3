<?php

declare(strict_types=1);

namespace Modules\UI\Tests\Unit\Filament\Forms\Components;

use Modules\UI\Filament\Forms\Components\ParentSelect;
use Tests\TestCase;

/**
 * Class ParentSelectTest.
 *
 * @covers \Modules\UI\Filament\Forms\Components\ParentSelect
 */
final class ParentSelectTest extends TestCase
{
    private ParentSelect $parentSelect;

    protected function setUp(): void
    {
        parent::setUp();

        /* @todo Correctly instantiate tested object to use it. */
        $this->parentSelect = new ParentSelect();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->parentSelect);
    }

    public function testGetOptionValueProperty(): void
    {
        $expected = '42';
        $property = (new \ReflectionClass(ParentSelect::class))
            ->getProperty('optionValueProperty');
        $property->setValue($this->parentSelect, $expected);
        self::assertSame($expected, $this->parentSelect->getOptionValueProperty());
    }
}
