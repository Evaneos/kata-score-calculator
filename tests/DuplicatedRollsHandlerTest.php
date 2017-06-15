<?php

namespace Evaneos\Kata\Solid;

use Evaneos\Kata\Solid\DuplicatedRollsHandler;

class DuplicatedRollsHandlerTest extends \PHPUnit_Framework_TestCase
{
    private $handler;

    public function setUp()
    {
        $this->handler = new DuplicatedRollsHandler();
    }

    /** @test */
    public function it_should_handle()
    {
        $this->assertSame(8, $this->handler->handle([1, 1, 4, 4]));
    }

    /** @test */
    public function it_should_handle_best_doublons()
    {
        $this->assertSame(12, $this->handler->handle([1, 1, 4, 4, 4]));
    }
}
