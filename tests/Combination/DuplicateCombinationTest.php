<?php

namespace tests\Kata\ScoreCalculator\Combination;

use Kata\ScoreCalculator\Combination\DuplicateCombination;
use Kata\ScoreCalculator\RollOfDices;

class DuplicateCombinationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DuplicateCombination
     */
    private $SUT;

    public function setUp()
    {
        $this->SUT = new DuplicateCombination();
    }

    /**
     * @test
     */
    public function it_should_not_match_if_there_is_no_duplicate()
    {
        $rollOfDices = new RollOfDices('5;6;2;3;4');
        $match = $this->SUT->match($rollOfDices);

        $this->assertEquals(false, $match);
    }

    /**
     * @test
     */
    public function it_should_match_if_there_is_duplicate()
    {
        $rollOfDices = new RollOfDices('5;6;2;2;4');
        $match = $this->SUT->match($rollOfDices);

        $this->assertEquals(true, $match);
    }

    /**
     * @test
     */
    public function it_should_return_sum_of_duplicate_as_score()
    {
        $rollOfDices = new RollOfDices('5;6;2;2;4');
        $score = $this->SUT->getScore($rollOfDices);

        $this->assertSame(4, $score);
    }

    /**
     * @test
     * @dataProvider getHighestScoreExamples
     * @param $rawDicesResult
     * @param $expectedScore
     */
    public function it_should_return_the_highest_score($rawDicesResult, $expectedScore)
    {
        $rollOfDices = new RollOfDices($rawDicesResult);
        $score = $this->SUT->getScore($rollOfDices);

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
