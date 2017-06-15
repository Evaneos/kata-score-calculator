<?php

namespace Calculator;

class ScoreCalculator implements ScoreCalculatorInterface
{
    /**
     * @var CombinationCalculator
     */
    private $combinationCalculator;

    public function __construct(CombinationCalculator $combinationCalculator)
    {
        $this->combinationCalculator = $combinationCalculator;
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
        return max($this->combinationCalculator->additionCombinations($combinations));
    }
}