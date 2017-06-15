<?php

namespace Kata\ScoreCalculator;


class SimpleScoreCalculator implements ScoreCalculator
{
    public function calculateScore(string $rawDicesResult): int
    {
        $dicesResult = explode(';', $rawDicesResult);

        $duplicates = array_filter(
            array_reduce(
                $dicesResult,
                function ($acc, $result) {
                    if (!array_key_exists($result, $acc)) {
                        $acc[$result] = 0;
                    }
                    $acc[$result]++;
                    return $acc;
                },
                []
            ),
            function ($count) {
                return $count > 1;
            }
        );

        $result = [0];
        foreach ($duplicates as $diceValue => $diceCount) {
            $result[] = $diceValue * $diceCount;
        }

        return max($result);
    }

}
