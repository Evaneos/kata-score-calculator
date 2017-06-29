<?php

namespace Calculator;

use Calculator\Rules\MaxRules;
use Calculator\Rules\SquareRules;
use Calculator\Rules\SuiteRules;

class ScoreCalculator implements ScoreCalculatorInterface
{
    private $rules;

    public function __construct()
    {
        $this->rules = array(
            new SuiteRules(),
            new SquareRules(),
            new MaxRules(),
        );
    }

    /**
     * @param string $score
     * @return int
     * @throws \Exception
     */
    public function calculate($score)
    {
        if ($score == '') {
            return 0;
        }
        $combinations = CombinationFormatter::formatToArray($score);

        foreach($this->rules as $rule) {
            $result = $rule->apply($combinations);
            if($result) {
                return $result;
            }
        }

        return 0;
//        return max($this->combinationCalculator->additionCombinations($combinations));
    }
}