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
}
