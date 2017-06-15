<?php

namespace Kata\ScoreCalculator;


use Kata\ScoreCalculator\Combination\Combination;

class SimpleScoreCalculator implements ScoreCalculator
{
    /**
     * @var array
     */
    private $possibleCombinations;

    public function __construct(array $possibleCombinations)
    {
        $this->possibleCombinations = $possibleCombinations;
    }

    public function calculateScore(string $rawDicesResult): int
    {
        $rollOfDices = new RollOfDices($rawDicesResult);

        return $rollOfDices->getScore($this->possibleCombinations);
    }


}
