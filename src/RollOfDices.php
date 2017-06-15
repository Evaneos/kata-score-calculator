<?php

namespace Kata\ScoreCalculator;

use Kata\ScoreCalculator\Combination\Combination;

class RollOfDices
{
    /**
     * @var DiceFace[]
     */
    private $dicesFace;

    /**
     * RollOfDices constructor.
     * @param string $rawRollOfDices
     */
    public function __construct($rawRollOfDices)
    {
        $this->dicesFace = array_map(
            function ($faceValue) {
                return new DiceFace((int)$faceValue);
            },
            explode(';', $rawRollOfDices)
        );
    }

    /**
     * @return DiceFace[]
     */
    public function getDicesFace(): array
    {
        return $this->dicesFace;
    }

    /**
     * @return array
     */
    public function getRawDiceValues(): array
    {
        return array_map(
            function (DiceFace $face) {
                return $face->getValue();
            },
            $this->getDicesFace()
        );
    }

    public function getScore(array $possibleCombinations)
    {
        $matchingCombinations = $this->getMatchingCombinations($possibleCombinations);
        $scores = $this->getCombinationScores($matchingCombinations);

        return max($scores);
    }

    /**
     * @param Combination[] $possibleCombinations
     * @return Combination[]
     */
    private function getMatchingCombinations(array $possibleCombinations): array
    {
        return array_filter(
            $possibleCombinations,
            function (Combination $combination) {
                return $combination->match($this);
            }
        );
    }

    /**
     * @param $matchingCombinations
     * @return array
     */
    private function getCombinationScores($matchingCombinations): array
    {
        return array_map(
            function (Combination $combination) {
                return $combination->getScore($this);
            },
            $matchingCombinations
        );
    }
}
