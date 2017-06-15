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

        $matchingCombinations = $this->getMatchingCombinations($rollOfDices);
        $scores = $this->getCombinationScores($rollOfDices, $matchingCombinations);

        return max($scores);
    }

    /**
     * @param $rollOfDices
     * @return array
     */
    private function getMatchingCombinations($rollOfDices): array
    {
        return array_filter(
            $this->possibleCombinations,
            function (Combination $combination) use ($rollOfDices) {
                return $combination->match($rollOfDices);
            }
        );
    }

    /**
     * @param $rollOfDices
     * @param $matchingCombinations
     * @return array
     */
    private function getCombinationScores($rollOfDices, $matchingCombinations): array
    {
        return array_map(
            function (Combination $combination) use ($rollOfDices) {
                return $combination->getScore($rollOfDices);
            },
            $matchingCombinations
        );
    }

}
