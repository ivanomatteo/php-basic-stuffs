<?php

namespace IvanoMatteo\PhpBasicStuffs\Tests;

use IvanoMatteo\PhpBasicStuffs\Helpers\Helpers;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function helpers()
    {
        Helpers::load();
        $this->assertTrue(startsWith('pippo', 'pi'));
    }
}
