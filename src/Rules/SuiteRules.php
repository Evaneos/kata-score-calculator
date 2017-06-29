<?php

namespace Calculator\Rules;

class SuiteRules implements Rule {
    const BONUS_SUITE = 5;

    public function apply($scores) {
        sort($scores);
        $previousValue = null;

        foreach($scores as $value) {

            if($previousValue) {
                if($value !== ($previousValue + 1)) {
                    return false;
                }
            }
            $previousValue = $value;
        }
        return array_sum($scores) + self::BONUS_SUITE;
    }
}