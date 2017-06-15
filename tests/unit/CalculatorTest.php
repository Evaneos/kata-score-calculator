<?php

namespace ScoreCalculator\Test;

use ScoreCalculator\Calculator;
use ScoreCalculator\StringToIntContract;

class CalculatorTest extends \PHPUnit_Framework_TestCase
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
    public function canBeInstantiate()
    {
        $reflection = new \ReflectionClass(Calculator::class);

        $this->assertTrue($reflection->isInstantiable());
    }

    /**
     * @test
     * @depends canBeInstantiate
     */
    public function shouldImplementStringToIntContract()
    {
        $reflection = new \ReflectionClass(Calculator::class);

        $this->assertTrue($reflection->implementsInterface(StringToIntContract::class));
    }

    /**
     * @test
     * @depends shouldImplementStringToIntContract
     */
    public function shouldReturnZeroHavingNullString()
    {
        $calculator = new Calculator();
        $this->assertEquals(0, $calculator->getNumber());
    }
}
