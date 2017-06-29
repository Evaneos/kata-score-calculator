<?php

namespace Calculator\Rules;

use Calculator\CombinationCalculator;

class MaxRules implements Rule
{
    protected $combinationCalculator;

    public function __construct()
    {
        $this->combinationCalculator = new CombinationCalculator();
    }

    /**
     * @param array $scores
     * @return boolean
     */
    public function apply(array $scores)
    {
       return max($this->combinationCalculator->additionCombinations($scores));
    }
}