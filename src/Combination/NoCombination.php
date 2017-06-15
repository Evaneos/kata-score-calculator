<?php

namespace Kata\ScoreCalculator\Combination;

use Kata\ScoreCalculator\RollOfDices;

class NoCombination implements Combination
{
    public function match(RollOfDices $rollOfDices): bool
    {
        return true;
    }

    public function getScore(RollOfDices $rollOfDices): int
    {
        return 0;
    }

}