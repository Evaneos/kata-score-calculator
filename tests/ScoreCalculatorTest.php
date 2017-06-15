<?php
/**
 * Created by PhpStorm.
 * User: evaneos
 * Date: 15/06/2017
 * Time: 15:29
 */
namespace Calculator;

class ScoreCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_return_zero_with_no_input()
    {
        $calculator = new ScoreCalculator();

        $this->assertEquals( 0, $calculator->calculate(null));
    }
}
