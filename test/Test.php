<?php

namespace Kata\ScoreCalculator;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 15:17
 */
class Test extends TestCase
{
    /** @var ScoreCalculator */
    private $SUT;

    public function setUp()
    {
        $this->SUT = new ScoreCalculator();
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function it_should_not_have_more_than_a_fixed_number_of_dice()
    {
        $this->SUT->calculateScore('1;2;3;4;5;6');
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function it_should_not_have_less_than_a_fixed_number_of_dice()
    {
        $this->SUT->calculateScore('1;2;3;4');
    }

    /**
     * @test
     */
    public function it_should_return_zero_if_all_dice_values_are_different()
    {
        $this->assertSame(0, $this->SUT->calculateScore('1;2;3;4;5'));
    }
}
