<?php

namespace tests\Kata\ScoreCalculator;

use Kata\ScoreCalculator\Combination\DuplicateCombination;
use Kata\ScoreCalculator\Combination\NoCombination;
use Kata\ScoreCalculator\SimpleScoreCalculator;

class SimpleScoreCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SimpleScoreCalculator
     */
    private $SUT;

    public function setUp()
    {
        $this->SUT = new SimpleScoreCalculator(
            [
                new NoCombination(),
                new DuplicateCombination(),
            ]
        );
    }

    /**
     * @test
     */
    public function it_should_return_zero_if_empty_string()
    {
        $score = $this->SUT->calculateScore('');

        $this->assertSame(0, $score);
    }

    /**
     * @test
     */
    public function it_should_return_zero_if_there_is_no_double()
    {
        $score = $this->SUT->calculateScore('1;2;3;4;5');

        $this->assertSame(0, $score);
    }

    /**
     * @test
     */
    public function it_should_return_sum_of_a_double_number()
    {
        $score = $this->SUT->calculateScore('1;2;3;2;5');

        $this->assertSame(4, $score);
    }

    /**
     * @test
     * @dataProvider getHighestScoreExamples
     */
    public function it_should_return_the_highest_score($rawDicesResult, $expectedScore)
    {
        $score = $this->SUT->calculateScore($rawDicesResult);

        $this->assertSame($expectedScore, $score);
    }

    public function getHighestScoreExamples(){
        return [
            ['1;1;1;6;6', 12],
            ['6;6;1;1;1', 12],
            ['1;1;1;2;6', 3],
        ];
    }
}
