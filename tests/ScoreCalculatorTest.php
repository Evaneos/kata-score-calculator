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
        $calculator = new ScoreCalculator(new CombinationCalculator());

        $this->assertEquals( 0, $calculator->calculate(''));
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function should_receive_good_format() {
        $calculator = new ScoreCalculator(new CombinationCalculator());

        $calculator->calculate('1;2;3;4;5;;;');
    }

    /**
     * @test
     */
    public function a_suite_should_be_addition()
    {
        $calculator = new CombinationCalculator();

        $this->assertEquals([15], $calculator->additionCombinations([3,3,3,3,3]));
    }

    /** @test */
    public function  could_return_addition_of_max_occurrence() {
        $calculator = new CombinationCalculator();

        $this->assertEquals([8, 2, 1, 3], $calculator->additionCombinations([4, 4, 2, 1, 3]));
    }

    /** @test */
    public function le_score_aditionné_le_plus_elevé_doit_etre_retourné() {
        $calculator = new CombinationCalculator();

        $this->assertEquals([8, 3], $calculator->additionCombinations([4, 4, 1, 1, 1]));
    }

    /** @test */
    public function la_combinaison_la_plus_elevé_doit_etre_gardé()
    {
        $calculator = new ScoreCalculator(new CombinationCalculator());

        $this->assertEquals(8, $calculator->calculate('4;4;1;1;1'));
    }
}
