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
}
