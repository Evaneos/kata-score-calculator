<?php

namespace Calculator;

use Calculator\Rules\Rule;
use Calculator\Rules\SuiteRules;

class ScoreCalculator implements ScoreCalculatorInterface
{
    /**
     * @var CombinationCalculator
     */
    private $combinationCalculator;

    private $rules;

    public function __construct(CombinationCalculator $combinationCalculator)
    {
        $this->combinationCalculator = $combinationCalculator;
        $this->rules = array(
            new SuiteRules()
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