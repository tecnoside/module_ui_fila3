<?php

namespace Modules\UI\Tests\Unit\View\Components;

use Modules\UI\View\Components\Navbar;
use Tests\TestCase;

/**
 * Class NavbarTest.
 *
 * @covers \Modules\UI\View\Components\Navbar
 */
final class NavbarTest extends TestCase
{
    private Navbar $navbar;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->navbar = new Navbar();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->navbar);
    }

    public function testRender(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
