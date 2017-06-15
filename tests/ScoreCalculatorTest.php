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

        $this->assertEquals( 0, $calculator->calculate(''));
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function should_receive_good_format() {
        $calculator = new ScoreCalculator();

        $calculator->calculate('1;2;3;4;5;;;');
    }

    /**
     * @test
     */
    public function a_suite_should_be_addition()
    {
        $calculator = new ScoreCalculator();

        $this->assertEquals( 3, $calculator->calculate('3;3;3'));
    }
}
