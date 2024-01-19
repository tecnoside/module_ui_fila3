<?php

namespace Modules\UI\Filament\Tests\Unit\Forms\Components;

use Modules\UI\Filament\Forms\Components\ParentSelect;
use ReflectionClass;
use Tests\TestCase;

/**
 * Class ParentSelectTest.
 *
 * @covers \Modules\UI\Filament\Forms\Components\ParentSelect
 */
final class ParentSelectTest extends TestCase
{
    private ParentSelect $parentSelect;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->parentSelect = new ParentSelect();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->parentSelect);
    }

    public function testGetOptionValueProperty(): void
    {
        $expected = '42';
        $property = (new ReflectionClass(ParentSelect::class))
            ->getProperty('optionValueProperty');
        $property->setValue($this->parentSelect, $expected);
        self::assertSame($expected, $this->parentSelect->getOptionValueProperty());
    }
}
