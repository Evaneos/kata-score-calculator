<?php

namespace Kata\ScoreCalculator\Combination;

use Kata\ScoreCalculator\RollOfDices;

interface Combination
{
    public static function match(RollOfDices $rollOfDices): bool;

    public static function getScore(RollOfDices $rollOfDices): int;
}