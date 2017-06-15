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
    const VALID_DICE_FACES = ['1', '2', '3', '4', '5', '6'];

    /**
     * @param string $score
     * @return int
     */
    public function calculateScore($score)
    {
        $scores = null === $score ? [] : explode(';', $score);

        Assertion::count($scores, self::NUMBER_OF_DICES, 'Bad number of dices');
        Assertion::allInArray($scores, self::VALID_DICE_FACES);

        $duplicates = array_count_values($scores);

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