<?php

namespace Calculator\Rules;

class MaxRules implements Rule
{
    /**
     * @param array $scores
     * @return boolean
     */
    public function apply(array $dices)
    {
        $finalValue = [];
        foreach($dices as $dice) {
            if (isset($finalValue[$dice->getFace()])) {
                $finalValue[$dice->getFace()] += $dice->getValue();
            } else {
                $finalValue[$dice->getFace()] = $dice->getValue();
            }
        }

        return max($finalValue);
    }
}