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
        $scores = null === $score ? [] : explode(';', $score);

        Assertion::count($scores, self::NUMBER_OF_DICES, 'Bad number of dices');

        $duplicates = array_count_values($scores);
        if (count($duplicates) === self::NUMBER_OF_DICES) {
            return 0;
        }

        $filteredDuplicates = array_filter(
            $duplicates,
            function($occurences) {
                return $occurences > 1;
            }
        );

        return array_reduce(
            array_keys($filteredDuplicates),
            function($higherValue, $value) use ($filteredDuplicates) {
                $currentScore = $value * $filteredDuplicates[$value];

                return $currentScore;
            },
            0
        );
    }
}