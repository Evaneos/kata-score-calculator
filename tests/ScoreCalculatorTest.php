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
        CombinationFormatter::formatToArray('1;2;3;4;5;;;');
    }

    /** @test */
    public function should_receive_good_format_and_transform_to_array() {
        $array_valid = array(3,3,3,3,3);

        $this->assertEquals($array_valid, CombinationFormatter::formatToArray('3;3;3;3;3'));
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function should_receive_good_format_like_dice() {
        CombinationFormatter::formatToArray('9;2;1;4;5');
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
    public function la_suite_a_un_score_bonus() {
        $calculator = new CombinationCalculator();

        $this->assertEquals([20], $calculator->additionCombinations([1, 2, 3, 4, 5]));
        $this->assertEquals([25], $calculator->additionCombinations([2, 3, 4, 5, 6]));
    }

    /** @test */
    public function la_combinaison_la_plus_elevé_doit_etre_gardé()
    {
        $calculator = new ScoreCalculator(new CombinationCalculator());

        $this->assertEquals(8, $calculator->calculate('4;4;1;1;1'));
    }
}
