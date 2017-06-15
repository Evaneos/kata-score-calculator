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

        if (count($duplicates)) {
            return array_keys($duplicates)[0] * reset($duplicates);
        }
        return 0;
    }

}