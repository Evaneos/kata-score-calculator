<?php

namespace Calculator;

class CombinationCalculator
{
    public function additionCombinations(array $values)
    {
        $finalValue = [];
        foreach (array_count_values($values) as $val => $nbOccurrence) {
            $finalValue[] = $val * $nbOccurrence;
        }

        if (count($finalValue) == 5) {
            $finalValue = [ array_sum($finalValue) + 5 ];
        }

        return $finalValue;
    }
}
