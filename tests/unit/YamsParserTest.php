<?php

namespace Kata\Test\unit;

use Kata\YamsParser;

/**
 * Class YamsParserTest
 *
 * @package Kata\Test\unit
 **/
class YamsParserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function it_should_throw_an_exception_if_empty_string()
    {
        $this->setExpectedException(\UnexpectedValueException::class);
        YamsParser::parse('');
    }

    /**
     * @test
     */
    public function it_should_return_array_of_int()
    {
        $parsedArray = YamsParser::parse('2;3;4');
        $this->assertEquals([2,3,4], $parsedArray);
    }
}
