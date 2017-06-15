<?php

namespace Evaneos\Kata\Solid;

use Evaneos\Kata\Solid\SmallSuiteRollsHandler;

class SmallSuiteRollsHandlerTest extends \PHPUnit_Framework_TestCase
{
    private $handler;

    public function setUp()
    {
        $this->handler = new SmallSuiteRollsHandler();
    }

    /** @test */
    public function it_should_handle()
    {
        $this->assertSame(15, $this->handler->handle([1, 2, 3, 4, 5]));
    }
}
