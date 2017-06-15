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

    /**
     * @param string $score
     * @return int
     */
    public function calculateScore($score)
    {
        $scores = array_map(function ($value) {
            return DiceValue::fromValue($value);
        }, explode(';', $score));

        Assertion::count($scores, self::NUMBER_OF_DICES, 'Bad number of dices');

        $duplicates = array_count_values(array_map(function (DiceValue $value) {
            return $value->getValue();
        }, $scores));

        return max($this->calculateScoresByValues($duplicates));
    }

    /**
     * @param $duplicates
     * @return array
     */
    private function calculateScoresByValues($duplicates)
    {
        return array_map(function ($value) use ($duplicates) {
            if ($duplicates[$value] === 1) {
                return 0;
            }
            return $duplicates[$value] * $value;
        }, array_keys($duplicates));
    }
}