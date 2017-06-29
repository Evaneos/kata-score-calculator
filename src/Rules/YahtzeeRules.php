<?php

namespace Calculator\Rules;

class YahtzeeRules
{
    public function apply(array $scores) {

        $combinations = array_count_values($scores);
        if (array_search(5, $combinations)) {
            return array_sum($scores);
        }

        return false;
    }
}
