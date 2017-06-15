<?php

namespace Evaneos\Kata\Solid;

use Evaneos\Kata\Solid\Calculator;
use Evaneos\Kata\Solid\InputParser;
use Evaneos\Kata\Solid\RollsHandler;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $inputParser = new InputParser();
        $this->rollsHandler = $this->prophesize(RollsHandler::class);
        $handlers = [
            $this->rollsHandler->reveal(),
        ];
        $this->calculator = new Calculator($inputParser, $handlers);
    }

    /** @test */
    public function it_should_calculate()
    {
        $this->rollsHandler->handle([1, 1])->willReturn(2);
        $this->assertSame(2, $this->calculator->calculate('1;1'));
    }
}
