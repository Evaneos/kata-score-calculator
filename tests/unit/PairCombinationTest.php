<?php

namespace Kata\Test\unit;

use Kata\PairCombination;

/**
 * Class PairCombinationTest
 *
 * @package Kata\Test\unit
 **/
class PairCombinationTest extends \PHPUnit_Framework_TestCase
{
    private $SUT;

    /**
     * Set up the Unit Test
     */
    public function setUp()
    {
        $this->SUT = new PairCombination();
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
        $diceFaces = [2,2,5,5,1];
        $isSatisfy = $this->SUT->isSatisfied($diceFaces);
        $this->assertTrue($isSatisfy);
    }

    /**
     * @test
     */
    public function it_should_return_the_sum_of_the_highest_occured_number_when_occured_at_least_two_times()
    {
        $diceFaces = [5,2,5,2,1];
        $value = $this->SUT->score($diceFaces);

        $this->assertEquals(10, $value);
    }
}
