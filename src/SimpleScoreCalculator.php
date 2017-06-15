<?php

namespace Kata\ScoreCalculator;


class SimpleScoreCalculator implements ScoreCalculator
{
    public function calculateScore(string $rawDicesResult): int
    {
        $dicesResult = explode(';', $rawDicesResult);

        $facesCount = $this->getFacesCount($dicesResult);
        $duplicates = $this->getDuplicateFaces($facesCount);

        return $this->getMaxDuplicateScore($duplicates);
    }

    /**
     * @param $dicesResult
     * @return array
     */
    private function getFacesCount(array $dicesResult): array
    {
        return array_count_values($dicesResult);
    }

    /**
     * @param $facesCount
     * @return array
     */
    private function getDuplicateFaces($facesCount): array
    {
        $duplicates = array_filter(
            $facesCount,
            function ($count) {
                return $count > 1;
            }
        );
        return $duplicates;
    }

    /**
     * @param array $duplicates
     * @return int
     */
    private function getMaxDuplicateScore($duplicates): int
    {
        $result = array_map(function($diceCount, $diceValue){
            return $diceCount * $diceValue;
        }, $duplicates, array_keys($duplicates));
        return count($result) ? max($result) : 0;
    }

}
