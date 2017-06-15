<?php
/**
 * Created by PhpStorm.
 * User: quentin
 * Date: 15/06/2017
 * Time: 15:11
 */

namespace Kata\ScoreCalculator;

use Assert\Assertion;

class ScoreCalculator
{
    const NUMBER_OF_DICES = 5;
    const SMALL_STRAIGHT_SCORE = 20;
    const LARGE_STRAIGHT_SCORE = 25;

    /**
     * @param string $score
     * @return int
     */
    public function calculateScore(string $score)
    {
        $scores = array_map(function ($value) {
            return DiceValue::fromValue($value);
        }, explode(';', $score));

        Assertion::count($scores, self::NUMBER_OF_DICES, 'Bad number of dices');

        if ($this->isSmallStraight($scores)) {
            return self::SMALL_STRAIGHT_SCORE;
        } elseif ($this->isLargeStraight($scores)) {
            return self::LARGE_STRAIGHT_SCORE;
        }

        $duplicates = array_count_values(self::getSortedValuesAsInts($scores));

        return max($this->calculateScoresByValues($duplicates));
    }

    /**
     * @param $duplicates
     * @return array
     */
    private function calculateScoresByValues(array $duplicates)
    {
        return array_map(function ($value) use ($duplicates) {
            if ($duplicates[$value] === 1) {
                return 0;
            }
            return $duplicates[$value] * $value;
        }, array_keys($duplicates));
    }

    /**
     * @param DiceValue[] $scores
     * @return bool
     */
    private function isSmallStraight(array $scores)
    {
        return self::getSortedValuesAsInts($scores) === [1, 2, 3, 4, 5];
    }

    /**
     * @param DiceValue[] $scores
     * @return array
     */
    private static function getSortedValuesAsInts(array $scores): array
    {
        $intValues = array_map(function (DiceValue $value) {
            return $value->getValue();
        }, $scores);

        sort($intValues);

        return $intValues;
    }

    private function isLargeStraight($scores)
    {
        return self::getSortedValuesAsInts($scores) === [2, 3, 4, 5, 6];
    }
}