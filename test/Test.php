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
        $this->SUT = new ScoreCalculator(new RollResultParser());
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
    public function it_should_return_zero_if_all_dice_values_are_different_but_not_consecutive()
    {
        $this->assertSame(0, $this->SUT->calculateScore('1;2;3;4;6'));
    }

    /**
     * @test
     */
    public function it_should_return_sum_of_duplicate()
    {
        $this->assertSame(6, $this->SUT->calculateScore('1;2;3;4;3'));
    }

    /**
     * @test
     */
    public function it_should_return_the_highest_sum_of_duplicates()
    {
        $this->assertSame(8, $this->SUT->calculateScore('1;4;3;3;4'));
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function it_should_not_accept_invalide_6_faces_dice_methods()
    {
        $this->SUT->calculateScore('0;12;-3;5;7');
    }

    /**
 * @test
 */
    public function it_should_calculate_score_for_a_small_straight()
    {
        $this->assertSame(20, $this->SUT->calculateScore('3;4;1;2;5'));
    }

    /**
     * @test
     */
    public function it_should_calculate_score_for_a_large_straight()
    {
        $this->assertSame(25, $this->SUT->calculateScore('3;4;6;2;5'));
    }

    /**
     * @test
     */
    public function it_should_calculate_score_for_a_square()
    {
        $this->assertSame(50, $this->SUT->calculateScore('3;3;3;2;3'));
    }

    /**
     * @test
     */
    public function it_should_calculate_score_for_a_three_of_a_kind()
    {
        $this->assertSame(30, $this->SUT->calculateScore('3;3;1;2;3'));
    }
}
