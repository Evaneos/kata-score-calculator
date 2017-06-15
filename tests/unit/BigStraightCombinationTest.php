<?php

namespace Kata\Test;

use Kata\BigStraightCombination;

/**
 * Class BigStraightCombinationTest
 *
 * @package Kata\Test\unit
 **/
class BigStraightCombinationTest extends \PHPUnit_Framework_TestCase
{

    /** @var  \Kata\BigStraightCombination */
    private $SUT;

    /**
     * Set up the Unit Test
     */
    public function setUp()
    {
        $this->SUT = new BigStraightCombination();
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
        $diceFaces = [3,2,6,4,5];
        $isSatisfy = $this->SUT->isSatisfied($diceFaces);
        $this->assertTrue($isSatisfy);
    }

    /**
     * @test
     */
    public function it_should_return_the_sum_of_the_highest_occured_number_when_occured_at_least_two_times()
    {
        $diceFaces = [3,2,6,4,5];
        $value = $this->SUT->score($diceFaces);

        $this->assertEquals(BigStraightCombination::SCORE, $value);
    }
}
