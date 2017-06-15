<?php

namespace Evaneos\Kata\Solid;

use Evaneos\Kata\Solid\BigSuiteRollsHandler;

class BigSuiteRollsHandlerTest extends \PHPUnit_Framework_TestCase
{
    private $handler;

    public function setUp()
    {
        $this->handler = new BigSuiteRollsHandler();
    }

    /** @test */
    public function it_should_handle()
    {
        $this->assertSame(25, $this->handler->handle([2, 3, 4, 5, 6]));
    }
}
