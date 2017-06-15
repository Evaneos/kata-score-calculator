<?php

namespace Kata\Test;

use Kata\YamsScoreCalculator;

/**
 * Class StringToIntTest
 *
 * @package unit
 **/
class YamsScoreCalculatorTest extends \PHPUnit_Framework_TestCase
{
    /** @var  YamsScoreCalculator */
    private $SUT;

    /**
     * Set up the Unit Test
     */
    public function setUp()
    {
        $this->SUT = new YamsScoreCalculator();
    }

    /**
     *
     */
    public function tearDown()
    {
    }

    /**
     * @test
     */
    public function it_should_return_0_on_empty_string()
    {
        $value = $this->SUT->score('');

        $this->assertSame(0, $value);
    }

    /**
     * @test
     */
    public function it_should_return_0_when_no_number_occurs_at_least_2_times()
    {
        $dices = "1;3;4;5;6";
        $value = $this->SUT->score($dices);

        $this->assertSame(0, $value);
    }
    
    /**
     * @test
     */
    public function it_should_return_the_sum_of_the_highest_occured_number_when_occured_at_least_two_times()
    {
        $dices = '3;3;3;4;4';
        $value = $this->SUT->score($dices);

        $this->assertEquals(9, $value);
    }

    /**
     * @test
     */
    public function it_should_return_20_when_small_straight()
    {
        $dices = '5;2;3;4;1';
        $value = $this->SUT->score($dices);
        $this->assertEquals(20, $value);
    }

    /**
     * @test
     */
    public function it_should_return_25_when_big_straight()
    {
        $dices = '5;2;3;4;6';
        $value = $this->SUT->score($dices);
        $this->assertEquals(25, $value);
    }
}
