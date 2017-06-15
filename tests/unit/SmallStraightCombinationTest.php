<?php

namespace Kata\Test;

use Kata\SmallStraightCombination;

/**
 * Class SmallStraightCombinationTest
 *
 * @package Kata\Test\unit
 **/
class SmallStraightCombinationTest extends \PHPUnit_Framework_TestCase
{

    /** @var  \Kata\SmallStraightCombination */
    private $SUT;

    /**
     * Set up the Unit Test
     */
    public function setUp()
    {
        $this->SUT = new SmallStraightCombination();
    }

    /**
     * @test
     */
    public function it_should_not_satisfy_the_combination()
    {
        $diceFaces = [1,2,2,4,5];
        $isSatisfy = $this->SUT->isSatisfied($diceFaces);
        $this->assertFalse($isSatisfy);
    }

    /**
     * @test
     */
    public function it_should_satisfy_the_combination()
    {
        $diceFaces = [3,2,5,4,1];
        $isSatisfy = $this->SUT->isSatisfied($diceFaces);
        $this->assertTrue($isSatisfy);
    }

    /**
     * @test
     */
    public function it_should_return_the_sum_of_the_highest_occured_number_when_occured_at_least_two_times()
    {
        $diceFaces = [3,2,5,4,1];
        $value = $this->SUT->score($diceFaces);

        $this->assertEquals(SmallStraightCombination::SCORE, $value);
    }
}
