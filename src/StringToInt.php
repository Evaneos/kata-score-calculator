<?php

namespace Kata;

/**
 * Class StringToInt
 *
 * @package Kata\ScoreCalculator
 **/
class StringToInt implements StringToIntInterface
{

    /**
     * @param string $value
     *
     * @return int
     */
    public function cast(string $value): int
    {
        if (empty($value)) {
            return 0;
        }

        $values = array_map('intval',(explode(';', $value)));
        if (count(array_unique($values)) === 5) {
            return 0;
        }

        $arrayCountValues = array_count_values($values);
        $arrayFiltered = array_filter($arrayCountValues, function ($value) {
            return $value > 1;
        });
        $toKeep = max(array_keys($arrayFiltered));
        $values = array_filter($values, function ($current) use ($toKeep) {
            return $current == $toKeep;
        });

        return array_reduce($values, function ($before, $current) {
            return $before + $current;
        }, 0);
    }
}
