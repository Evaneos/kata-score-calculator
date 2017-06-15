<?php

namespace tests\Kata\ScoreCalculator;

use Kata\ScoreCalculator\SimpleScoreCalculator;

class SimpleScoreCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SimpleScoreCalculator
     */
    private $SUT;

    public function setUp()
    {
        $this->SUT = new SimpleScoreCalculator();
    }

    /**
     * @test
     */
    public function it_should_return_zero_if_empty_string()
    {
        $score = $this->SUT->calculateScore('');

        $this->assertSame(0, $score);
    }
}