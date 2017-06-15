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

    /**
     * @param string $rollResult
     * @return int
     */
    public function calculateScore(string $rollResult): int
    {
        $roll = self::parseRollResult($rollResult);

        if (self::isSmallStraight($roll)) {
            return self::SMALL_STRAIGHT_SCORE;
        } elseif (self::isLargeStraight($roll)) {
            return self::LARGE_STRAIGHT_SCORE;
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
     * @param string $rollResult
     * @return Roll
     */
    private static function parseRollResult(string $rollResult): Roll
    {
        return new Roll(array_map(function ($value) {
            return DiceValue::fromValue((int) $value);
        }, explode(';', $rollResult)));
    }
}