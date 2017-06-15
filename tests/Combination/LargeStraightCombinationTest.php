<?php

namespace tests\Kata\ScoreCalculator\Combination;

use Kata\ScoreCalculator\Combination\LargeStraightCombination;
use Kata\ScoreCalculator\RollOfDices;

class LargeStraightCombinationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LargeStraightCombination
     */
    private $SUT;

    public function setUp()
    {
        $this->SUT = new LargeStraightCombination();
    }

    /**
     * @test
     */
    public function it_should_not_match_if_there_is_no_large_straight()
    {
        $rollOfDices = new RollOfDices('5;5;5;5;5');
        $match = $this->SUT->match($rollOfDices);

        $this->assertEquals(false, $match);
    }

}
