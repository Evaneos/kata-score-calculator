<?php

namespace ScoreCalculator\Test;

use ScoreCalculator\Calculator;

class MyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Init the mocks
     */
    public function setUp()
    {
    }

    public function tearDown()
    {
        \Mockery::close();
    }

    /**
     * @test
     */
    public function it_should_return_0_if_not_given_anything()
    {
        $calculator = new Calculator();
        $this->assertEquals(0, $calculator->getNumber());
    }
}
