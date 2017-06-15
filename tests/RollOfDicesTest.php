<?php

namespace Kata\ScoreCalculator;

class RollOfDicesTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_should_return_dices_face()
    {
        $rollOfDices = new RollOfDices('5;6;2;3;4');

        $this->assertEquals(
            [new DiceFace(5), new DiceFace(6), new DiceFace(2), new DiceFace(3), new DiceFace(4)],
            $rollOfDices->getDicesFace()
        );
    }
}