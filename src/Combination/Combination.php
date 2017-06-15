<?php

namespace Kata\ScoreCalculator\Combination;

use Kata\ScoreCalculator\RollOfDices;

interface Combination
{
    public function match(RollOfDices $rollOfDices): bool;

    public function getScore(RollOfDices $rollOfDices): int;
}
