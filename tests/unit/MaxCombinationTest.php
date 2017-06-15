<?php

namespace Kata\Test;

use Kata\MaxCombination;

/**
 * Class MaxCombinationTest
 *
 * @package Kata\Test
 **/
class MaxCombinationTest extends \PHPUnit_Framework_TestCase
{

    /** @var  \Kata\MaxCombination */
    private $SUT;

    /**
     * Set up the Unit Test
     */
    public function setUp()
    {
        $this->SUT = new MaxCombination();
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
    public function it_should_not_satisfy_the_combination()
    {
        $diceFaces = [1,2,3,4,5];
        $isSatisfy = $this->SUT->isSatisfied($diceFaces);
        $this->assertFalse($isSatisfy);
    }

    /**
     * @test
     */
    public function it_should_satisfy_the_combination()
    {
        $diceFaces = [2,3,3,3,3];
        $isSatisfy = $this->SUT->isSatisfied($diceFaces);
        $this->assertTrue($isSatisfy);
    }

    /**
     * @test
     */
    public function it_should_return_the_sum_of_the_highest_occured_number_when_occured_at_least_two_times()
    {
        $diceFaces = [2,3,3,3,3];
        $value = $this->SUT->score($diceFaces);

        $this->assertEquals(12, $value);
    }
}
