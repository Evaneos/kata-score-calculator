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
     */
    public function it_should_return_default_score_when_given_empty_score()
    {
        $this->assertSame(0, $this->SUT->calculateScore());
    }

    /**
     * @test
     */
    public function it_should_add_the_values_of_dices_separated_by_semicolons()
    {
        $this->assertEquals(21, $this->SUT->calculateScore('1;2;3;4;5;6'));
    }
}
