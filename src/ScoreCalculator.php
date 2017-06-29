<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 15:11
 */

namespace Kata\ScoreCalculator;

class ScoreCalculator
{
    const SMALL_STRAIGHT_SCORE = 20;
    const LARGE_STRAIGHT_SCORE = 25;
    const SQUARE_SCORE = 50;

    /**
     * @var RollResultParser
     */
    private $parser;

    /**
     * ScoreCalculator constructor.
     */
    public function __construct(RollResultParser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @param string $rollResult
     * @return int
     */
    public function calculateScore(string $rollResult): int
    {
        $roll = $this->parser->parseRollResult($rollResult);

        if (self::isSmallStraight($roll)) {
            return self::SMALL_STRAIGHT_SCORE;
        }

        if (self::isLargeStraight($roll)) {
            return self::LARGE_STRAIGHT_SCORE;
        }

        if (self::isSquare($roll)) {
            return self::SQUARE_SCORE;
        }

        return max(self::calculateScoresByValues($roll->getDiceValueOccurences()));
    }


    /**
     * @param DiceValueOccurences[]
     * @return array
     */
    private static function calculateScoresByValues(array $duplicates): array
    {
        return array_map(function (DiceValueOccurence $occurence) use ($duplicates) {
            if ($occurence->getCount() < 2) {
                return 0;
            }
            return $occurence->getCount() * $occurence->getDiceValue();
        }, $duplicates);
    }

    /**
     * @param Roll $roll
     * @return bool
     */
    private static function isSmallStraight(Roll $roll): bool
    {
        return $roll->isConsecutive() && $roll->getMaxValue() === 5;
    }

    /**
     * @param Roll $roll
     * @return bool
     */
    private static function isLargeStraight(Roll $roll): bool
    {
        return $roll->isConsecutive() && $roll->getMaxValue() === 6;
    }

    /**
     * @param Roll $roll
     */
    private static function isSquare(Roll $roll)
    {
        return array_reduce(
            $roll->getDiceValueOccurences(),
            function ($squareFound, DiceValueOccurence $occurence) {
                return $squareFound || $occurence->getCount() === 4;
            },
            false
        );
    }
}