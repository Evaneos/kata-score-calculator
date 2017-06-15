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
        if (preg_match('/^([0-9]{1,};){0,}[0-9]{0,1}$/', $score) == 0) {
            throw new \Exception("Bad format");
        }

        $score = explode(';', $score);

        return max($this->combinationCalculator->additionCombinations($score));
    }
}