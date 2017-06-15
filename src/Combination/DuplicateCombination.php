<?php

namespace Kata\ScoreCalculator\Combination;

use Kata\ScoreCalculator\DiceFace;
use Kata\ScoreCalculator\RollOfDices;

class DuplicateCombination implements Combination
{
    public static function match(RollOfDices $rollOfDices): bool
    {
        return max(
                array_count_values(
                    array_map(
                        function (DiceFace $face) {
                            return $face->getValue();
                        },
                        $rollOfDices->getDicesFace()
                    )
                )
            ) > 1;
    }

    public static function getScore(RollOfDices $rollOfDices): int
    {
    }

}