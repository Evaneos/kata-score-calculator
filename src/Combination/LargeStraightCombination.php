<?php

namespace Kata\ScoreCalculator\Combination;

use Kata\ScoreCalculator\DiceFace;
use Kata\ScoreCalculator\RollOfDices;

class LargeStraightCombination implements Combination
{
    /**
     * @param RollOfDices $rollOfDices
     * @return bool
     */
    public function match(RollOfDices $rollOfDices): bool
    {
        return empty(
            array_diff(
                [2,3,4,5,6],
                array_unique($rollOfDices->getRawDiceValues()
                )
            )
        );
    }

    public function getScore(RollOfDices $rollOfDices): int
    {
        // TODO: Implement getScore() method.
    }

    private function removeDuplicates() {

    }
}
