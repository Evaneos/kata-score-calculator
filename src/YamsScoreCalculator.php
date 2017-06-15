<?php

namespace Kata;

/**
 * Class StringToInt
 *
 * @package Kata\ScoreCalculator
 **/
class YamsScoreCalculator implements ScoreCalculator
{

    /**
     * @param string $value
     *
     * @return int
     */
    public function score(string $value): int
    {
        try {
            $parsedArray = YamsParser::parse($value);
        } catch (\UnexpectedValueException $e) {
            return 0;
        }

        if (count(array_unique($parsedArray)) === 5) {
           return 0;
        }

        $parsedArray = array_filter(
            array_count_values($parsedArray),
            function ($value) {
                return $value > 1;
            }
        );

        foreach ($parsedArray as $key => $value) {
            $parsedArray[$key] = $key * $value;
        };

        return max($parsedArray);
    }
}
