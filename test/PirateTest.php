<?php

namespace Kata\ScoreCalculator;
use Kata\ScoreCalculator\Combination\FullCombination;
use Kata\ScoreCalculator\Combination\OtherCombination;
use Kata\ScoreCalculator\Combination\SquareCombination;
use Kata\ScoreCalculator\Combination\ThreeOfAKindCombination;
use Kata\ScoreCalculator\DiceFace\PirateDiceFace;
use Kata\ScoreCalculator\RollResultParser\PirateRollResultParser;
use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 15:17
 */
class PirateTest extends TestCase
{
    /** @var Yahtzee */
    private $SUT;

    public function setUp()
    {
        $this->SUT = new Yahtzee(
            new PirateRollResultParser(),
            new ScoreCalculator(
                [
                    new FullCombination(),
                    new OtherCombination(),
                    new SquareCombination(),
                    new ThreeOfAKindCombination()
                ]
            )
        );
    }

    /**
     * @test
     */
    public function it_should_return_the_highest_sum_of_duplicates()
    {
        $this->assertSame(
            10,
            $this->SUT->roll(
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::GOLD . ';' .
                PirateDiceFace::GOLD . ';' .
                PirateDiceFace::SWORDS
            )
        );
    }

    /**
     * @test
     */
    public function it_should_calculate_score_for_a_square()
    {
        $this->assertSame(
            50,
            $this->SUT->roll(
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::SWORDS
            )
        );
    }

    /**
     * @test
     */
    public function it_should_calculate_score_for_a_three_of_a_kind()
    {
        $this->assertSame(
            30,
            $this->SUT->roll(
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::GOLD . ';' .
                PirateDiceFace::SWORDS
            )
        );
    }

    /**
     * @test
     */
    public function it_should_calculate_score_for_a_pirate_full()
    {
        $this->assertSame(
            40,
            $this->SUT->roll(
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::PARROT . ';' .
                PirateDiceFace::SWORDS . ';' .
                PirateDiceFace::SWORDS
            )
        );
    }
}
