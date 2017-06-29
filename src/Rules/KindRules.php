<?php

namespace Calculator\Rules;

class KindRules implements Rule
{

    /**
     * @param array $scores
     * @return boolean
     */
    public function apply(array $scores)
    {
        $combinations = array_count_values($scores);
        if (array_search(3, $combinations)) {
            return array_sum($scores);
        }

        return false;
    }
}