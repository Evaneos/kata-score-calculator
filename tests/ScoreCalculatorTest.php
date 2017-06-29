<?php
/**
 * Created by PhpStorm.
 * User: evaneos
 * Date: 15/06/2017
 * Time: 15:29
 */
namespace Calculator;

use Calculator\Rules\MaxRules;
use Calculator\Rules\SquareRules;
use Calculator\Rules\SuiteRules;

class ScoreCalculatorTest extends \PHPUnit_Framework_TestCase
{
//    /** @test */
//    public function should_return_zero_with_no_input()
//    {
//        $calculator = new ScoreCalculator(new CombinationCalculator());
//
//        $this->assertEquals( 0, $calculator->calculate(''));
//    }
//
//    /**
//     * @test
//     * @expectedException \Exception
//     */
//    public function should_receive_good_format() {
//        CombinationFormatter::formatToArray('1;2;3;4;5;;;');
//    }
//
//    /** @test */
//    public function should_receive_good_format_and_transform_to_array() {
//        $array_valid = array(3,3,3,3,3);
//
//        $this->assertEquals($array_valid, CombinationFormatter::formatToArray('3;3;3;3;3'));
//    }
//
//    /**
//     * @test
//     * @expectedException \Exception
//     */
//    public function should_receive_good_format_like_dice() {
//        CombinationFormatter::formatToArray('9;2;1;4;5');
//    }
//
//    /**
//     * @test
//     */
//    public function a_suite_should_be_addition()
//    {
//        $calculator = new CombinationCalculator();
//
//        $this->assertEquals([15], $calculator->additionCombinations([3,3,3,3,3]));
//    }

    /** @test */
    public function  could_return_addition_of_max_occurrence() {

        $dices = array(
            new Dice('diamond', 5),
            new Dice('monkey', 1),
            new Dice('dead', null),
            new Dice('diamond', 5),
            new Dice('parrot', 1)
        );

        $rule = new MaxRules($dices);

        $this->assertEquals(10, $rule->apply($dices));

    }
//
//    /** @test */
//    public function le_score_aditionné_le_plus_elevé_doit_etre_retourné() {
//        $calculator = new CombinationCalculator();
//        $this->assertEquals([8, 3], $calculator->additionCombinations([4, 4, 1, 1, 1]));
//    }
//
//    /** @test */
//    public function la_suite_a_un_score_bonus() {
//        $calculator = new SuiteRules();
//
//        $this->assertEquals(20, $calculator->apply([1, 2, 3, 4, 5]));
//        $this->assertEquals(25, $calculator->apply([2, 3, 4, 5, 6]));
//    }
//
//    /** @test */
//    public function la_combinaison_la_plus_elevé_doit_etre_gardé()
//    {
//        $calculator = new ScoreCalculator(new CombinationCalculator());
//
//        $this->assertEquals(8, $calculator->calculate('4;4;1;1;1'));
//    }
//    /** @test */
//    public function test_multiple_combination() {
//        $calculator = new ScoreCalculator(new CombinationCalculator());
//
//        $combinations = array(
//            6 => '1;3;3;5;6',
//            12 => '3;3;6;6;4',
//            18 => '6;3;6;4;6',
////            6 => '1;4;6;3;2'
//        );
//
//        foreach($combinations as $value => $combination) {
//            $this->assertEquals($value, $calculator->calculate($combination));
//        }
//    }
//
//    /**
//     * @test
//     */
//    public function test_un_carré_comporte_quatres_dès_identiques()
//    {
//        $rule = new SquareRules();
//
//        $this->assertFalse($rule->apply([4, 4, 3, 3, 2, 1]));
//    }
//
//    /**
//     * @test
//     */
//    public function test_un_carré_donne_la_somme_de_tous_les_dès()
//    {
//        $rule = new SquareRules();
//
//        $this->assertEquals(19, $rule->apply([4, 4, 4, 4, 2, 1]));
//    }
//
//    /**
//     * @test
//     */
//    public function test_un_yathzee_comporte_cinq_dès_identiques()
//    {
//        $rule = new SquareRules();
//
//        $this->assertFalse($rule->apply([4, 4, 3, 2, 6, 1]));
//    }
//
//    /**
//     * @test
//     */
//    public function test_un_yahtzee_donne_la_somme_de_tous_les_dès()
//    {
//        $rule = new SquareRules();
//
//        $this->assertEquals(21, $rule->apply([4, 4, 4, 4, 4, 1]));
//    }
//
//    public function test_un_brelan_donne_la_somme_de_tous_les_des()
//    {
//        $rule = new KindRules();
//
//        $this->assertEquals( 12, $rule->apply([2, 2, 2, 3, 3]));
//    }
}
