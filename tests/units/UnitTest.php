<?php

namespace Tests\Units;

use PHPUnit\Framework\TestCase;
use Tests\BootTraits;

abstract class UnitTest extends TestCase
{
    use BootTraits;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->_boot();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        if (method_exists($this, '_down')) {
            $this->_down();
        }
    }
}
