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
     * Initialize the Unit Test data
     */
    private function initializeData()
    {
    }
}
