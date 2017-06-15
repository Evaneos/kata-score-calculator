<?php

use Evaneos\Kata\Solid\InputParser;

class InputParserTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_should_provide_rolls()
    {
        $input = new InputParser();
        $this->assertSame([1, 4, 5, 6], $input->parse("1;4;5;6"));
    }
}
