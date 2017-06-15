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
    const SMALL_STRAIGHT_SCORE = 20;
    const LARGE_STRAIGHT_SCORE = 25;

    /**
     * @param string $score
     * @return int
     */
    public function calculateScore(string $score)
    {
        $scores = new Roll(array_map(function ($value) {
            return DiceValue::fromValue($value);
        }, explode(';', $score)));

        if ($scores->isSmallStraight()) {
            return self::SMALL_STRAIGHT_SCORE;
        } elseif ($scores->isLargeStraight()) {
            return self::LARGE_STRAIGHT_SCORE;
        }

        $duplicates = array_count_values($scores->getValuesAsInts());

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
}