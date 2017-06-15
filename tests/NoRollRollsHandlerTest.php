<?php

namespace Evaneos\Kata\Solid;

use Evaneos\Kata\Solid\NoRollRollsHandler;

class NoRollRollsHandlerTest extends \PHPUnit_Framework_TestCase
{
    private $handler;

    public function setUp()
    {
        $this->handler = new NoRollRollsHandler();
    }

    /** @test */
    public function it_should_handle()
    {
        $this->assertSame(0, $this->handler->handle([]));
    }
}
