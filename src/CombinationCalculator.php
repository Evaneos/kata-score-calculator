<?php

namespace Calculator;

class CombinationCalculator
{
    const BONUS_SUITE = 5;

    public function additionCombinations(array $values)
    {
        if($this->checkSuite($values)) {
            return [ array_sum($values) + self::BONUS_SUITE ];
        } else {
            $finalValue = [];
            foreach (array_count_values($values) as $val => $nbOccurrence) {
                $finalValue[] = $val * $nbOccurrence;
            }

            return $finalValue;
        }
////        dump($values);exit;
//        $finalValue = [];
//        foreach (array_count_values($values) as $val => $nbOccurrence) {
//            $finalValue[] = $val * $nbOccurrence;
//        }
//
//        if (count($finalValue) == 5) {
//            $finalValue{} = array_sum($finalValue) + self::BONUS_SUITE;
//        }
//
//        return $finalValue;
    }

    public function checkSuite($values)
    {
        sort($values);
        $previousValue = null;

        foreach($values as $value) {

            if($previousValue) {
                if($value !== ($previousValue + 1)) {
                    return false;
                }
            }
            $previousValue = $value;
        }
        return true;
    }
}
