<?php

namespace Kata\ScoreCalculator\Combination;

use Kata\ScoreCalculator\DiceFace;
use Kata\ScoreCalculator\RollOfDices;

class DuplicateCombination implements Combination
{
    public function match(RollOfDices $rollOfDices): bool
    {
        return max(
                array_count_values($rollOfDices->getRawDiceValues())
            ) > 1;
    }

    public function getScore(RollOfDices $rollOfDices): int
    {
        return $this->getMaxDuplicateScore(
            $this->getMultiples($rollOfDices->getRawDiceValues())
        );
    }

    /**
     * @param array $values
     * @return array
     */
    private function getMultiples(array $values)
    {
        return array_filter(
            array_count_values($values),
            function ($count) { return $count > 1; }
        );
    }

    /**
     * @param array $values
     * @return int
     */
    private function getMaxDuplicateScore(array $values): int
    {
        $result = array_map(function($count, $value){
            return $count * $value;
        }, $values, array_keys($values));

        return count($result) ? max($result) : 0;
    }

}
