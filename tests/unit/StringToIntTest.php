<?php

namespace Kata\Test;

use Kata\StringToInt;

/**
 * Class StringToIntTest
 *
 * @package unit
 **/
class StringToIntTest extends \PHPUnit_Framework_TestCase
{
    /** @var  StringToInt */
    private $SUT;

    /**
     * Set up the Unit Test
     */
    public function setUp()
    {
        $this->SUT = new StringToInt();
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
        $value = $this->SUT->cast('');

        $this->assertSame(0, $value);
    }

    /**
     * @test
     */
    public function it_should_return_0_when_no_number_occurs_at_least_2_times()
    {
        $dices = "1;2;3;4;5";
        $value = $this->SUT->cast($dices);

        $this->assertSame(0, $value);
    }
    
    /**
     * @test
     */
    public function it_should_return_the_sum_of_the_highest_number_when_occured_at_least_two_times()
    {
        $dices = '3;3;3;4;4';
        $value = $this->SUT->cast($dices);

        $this->assertEquals(8, $value);
    }
    
    /**
     * @test
     */
    public function it_should_()
    {
        
    }
}
