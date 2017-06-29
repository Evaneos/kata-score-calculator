<?php

namespace Calculator;

class CombinationCalculator
{
    const BONUS_SUITE = 5;

    public function additionCombinations(array $values)
    {
        $finalValue = [];
        foreach (array_count_values($values) as $val => $nbOccurrence) {
            $finalValue[] = $val * $nbOccurrence;
        }

        return $finalValue;
    }
}
