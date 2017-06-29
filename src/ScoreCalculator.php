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
    const THREE_OF_A_KIND_SCORE = 30;
    const FULL_SCORE = 40;

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

        if (self::isFull($roll)) {
            return self::FULL_SCORE;
        }

        if (self::isThreeOfAKind($roll)) {
            return self::THREE_OF_A_KIND_SCORE;
        }

        return max(self::calculateScoresByValues($roll->getDiceValueOccurences()));
    }

    /**
     * @param DiceValueOccurences[]
     * @return array
     */
    private static function calculateScoresByValues(array $duplicates): array
    {
        return array_map(function (DiceFaceOccurence $occurence) use ($duplicates) {
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
    private static function isSquare(Roll $roll): bool
    {
        return $roll->isAnyDiceValuePresentExactlyNTimes(4);
    }

    /**
     * @param Roll $roll
     */
    private static function isThreeOfAKind(Roll $roll): bool
    {
        return $roll->isAnyDiceValuePresentExactlyNTimes(3);
    }

    /**
     * @param Roll $roll
     */
    private static function isFull(Roll $roll)
    {
        return $roll->isAnyDiceValuePresentExactlyNTimes(3)
            && $roll->isAnyDiceValuePresentExactlyNTimes(2);
    }
}